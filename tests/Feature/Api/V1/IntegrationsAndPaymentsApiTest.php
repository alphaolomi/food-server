<?php

use App\Enums\OrganizationRole;
use App\Models\Order;
use App\Models\Organization;
use App\Models\Payment;
use App\Models\PaymentAttempt;
use App\Models\Store;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
    Http::fake(['*' => Http::response(['ok' => true], 200)]);
});

test('org admin can create webhook subscription', function () {
    $user = User::query()->where('email', 'test@example.com')->firstOrFail();
    $org = Organization::query()->where('slug', 'mloji-demo')->firstOrFail();

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson('/api/v1/webhook-subscriptions', [
        'organization_id' => $org->id,
        'url' => 'https://example.test/hooks',
        'events' => ['order.confirmed'],
    ]);

    $response->assertCreated()
        ->assertJsonPath('events', ['order.confirmed'])
        ->assertJsonStructure(['id', 'secret', 'url']);
});

test('payment callback returns 404 for unknown reference', function () {
    $this->postJson('/api/v1/payments/callbacks/tz_mobile_money_stub', [
        'reference' => 'no_such_ref',
        'status' => 'succeeded',
    ])
        ->assertNotFound()
        ->assertJsonPath('code', 'unknown_reference');
});

test('outsider cannot create webhook subscription', function () {
    $org = Organization::query()->where('slug', 'mloji-demo')->firstOrFail();
    $outsider = User::factory()->create();

    Sanctum::actingAs($outsider, ['*']);

    $this->postJson('/api/v1/webhook-subscriptions', [
        'organization_id' => $org->id,
        'url' => 'https://example.test/hooks',
        'events' => ['order.confirmed'],
    ])->assertForbidden();
});

test('org admin can list and delete webhook subscriptions', function () {
    $user = User::query()->where('email', 'test@example.com')->firstOrFail();
    $org = Organization::query()->where('slug', 'mloji-demo')->firstOrFail();

    Sanctum::actingAs($user, ['*']);

    $created = $this->postJson('/api/v1/webhook-subscriptions', [
        'organization_id' => $org->id,
        'url' => 'https://example.test/list-delete',
        'events' => ['order.confirmed'],
    ]);

    $created->assertCreated();
    $id = $created->json('id');

    $this->getJson("/api/v1/organizations/{$org->id}/webhook-subscriptions")
        ->assertOk()
        ->assertJsonPath('data.0.id', $id);

    $this->deleteJson("/api/v1/webhook-subscriptions/{$id}")
        ->assertOk();

    $this->getJson("/api/v1/organizations/{$org->id}/webhook-subscriptions")
        ->assertOk()
        ->assertJsonPath('data', []);
});

test('payment callback completes async attempt and creates payment', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $user = User::factory()->create();

    $order = Order::query()->create([
        'store_id' => $store->id,
        'user_id' => $user->id,
        'status' => 'pending',
        'total_cents' => 3500,
        'fulfillment_type' => 'pickup',
        'idempotency_key' => null,
    ]);

    $externalRef = 'async_ref_'.bin2hex(random_bytes(4));

    PaymentAttempt::query()->create([
        'order_id' => $order->id,
        'provider' => 'tz_mobile_money_stub',
        'status' => 'processing',
        'amount_cents' => 3500,
        'external_ref' => $externalRef,
        'payment_id' => null,
        'meta' => [],
    ]);

    $this->postJson('/api/v1/payments/callbacks/tz_mobile_money_stub', [
        'reference' => $externalRef,
        'status' => 'succeeded',
    ])
        ->assertOk()
        ->assertJsonPath('status', 'succeeded');

    $attempt = PaymentAttempt::query()
        ->where('external_ref', $externalRef)
        ->firstOrFail();

    expect($attempt->payment_id)->not->toBeNull();
    expect($attempt->status)->toBe('succeeded');

    $payment = Payment::query()->findOrFail($attempt->payment_id);
    expect($payment->order_id)->toBe($order->id);
});

test('payment callback failed marks attempt failed', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $user = User::factory()->create();

    $order = Order::query()->create([
        'store_id' => $store->id,
        'user_id' => $user->id,
        'status' => 'pending',
        'total_cents' => 1000,
        'fulfillment_type' => 'pickup',
        'idempotency_key' => null,
    ]);

    $externalRef = 'fail_ref_'.bin2hex(random_bytes(4));

    PaymentAttempt::query()->create([
        'order_id' => $order->id,
        'provider' => 'tz_mobile_money_stub',
        'status' => 'processing',
        'amount_cents' => 1000,
        'external_ref' => $externalRef,
        'payment_id' => null,
        'meta' => [],
    ]);

    $this->postJson('/api/v1/payments/callbacks/tz_mobile_money_stub', [
        'reference' => $externalRef,
        'status' => 'failed',
    ])->assertOk();

    $attempt = PaymentAttempt::query()
        ->where('external_ref', $externalRef)
        ->firstOrFail();

    expect($attempt->status)->toBe('failed');
    expect($attempt->payment_id)->toBeNull();
});

test('refund forbidden for another users payment', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = $store->catalogItems()->firstOrFail();
    $buyer = User::factory()->create();
    $intruder = User::factory()->create();

    Sanctum::actingAs($buyer, ['*']);

    $checkout = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [['catalog_item_id' => $item->id, 'quantity' => 1]],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ]);

    $checkout->assertCreated();
    $paymentId = $checkout->json('order.payments.0.id');

    Sanctum::actingAs($intruder, ['*']);

    $this->postJson("/api/v1/payments/{$paymentId}/refunds", [
        'amount_cents' => 100,
    ])
        ->assertForbidden()
        ->assertJsonPath('code', 'forbidden');
});

test('refund rejects amount over payment total', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = $store->catalogItems()->firstOrFail();
    $user = User::factory()->create();
    $store->organization->users()->attach($user->id, ['role' => OrganizationRole::Owner->value]);

    Sanctum::actingAs($user, ['*']);

    $checkout = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [['catalog_item_id' => $item->id, 'quantity' => 1]],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ]);

    $checkout->assertCreated();
    $paymentId = $checkout->json('order.payments.0.id');
    $total = $checkout->json('order.total_cents');

    $this->postJson("/api/v1/payments/{$paymentId}/refunds", [
        'amount_cents' => $total + 1,
    ])
        ->assertUnprocessable()
        ->assertJsonPath('code', 'invalid_refund');
});

test('authenticated user can request stub refund on own payment', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = $store->catalogItems()->firstOrFail();
    $user = User::factory()->create();
    $store->organization->users()->attach($user->id, ['role' => OrganizationRole::Owner->value]);

    Sanctum::actingAs($user, ['*']);

    $checkout = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [['catalog_item_id' => $item->id, 'quantity' => 1]],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ]);

    $checkout->assertCreated();
    $paymentId = $checkout->json('order.payments.0.id');

    $this->postJson("/api/v1/payments/{$paymentId}/refunds", [
        'amount_cents' => 500,
    ])
        ->assertCreated()
        ->assertJsonPath('refund.status', 'succeeded');
});
