<?php

use App\Models\CatalogItem;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Store;
use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->seed(DemoDataSeeder::class);
});

test('checkout creates confirmed order and kitchen ticket', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();
    $user = User::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 2],
        ],
    ]);

    $response->assertCreated()
        ->assertJsonPath('idempotent_replay', false)
        ->assertJsonPath('order.status', 'confirmed');

    expect($response->json('order.tickets'))->toHaveCount(1);
    expect($response->json('order.lines'))->toHaveCount(1);
});

test('checkout respects idempotency key', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();
    $user = User::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $payload = [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
    ];

    $key = 'idem-test-'.uniqid();

    $first = $this->withHeaders(['Idempotency-Key' => $key])
        ->postJson("/api/v1/stores/{$store->slug}/checkout", $payload);

    $first->assertCreated();

    $second = $this->withHeaders(['Idempotency-Key' => $key])
        ->postJson("/api/v1/stores/{$store->slug}/checkout", $payload);

    $second->assertOk()
        ->assertJsonPath('idempotent_replay', true)
        ->assertJsonPath('order.id', $first->json('order.id'));
});

test('checkout rejects invalid or unavailable catalog lines', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();
    $user = User::factory()->create();

    $otherOrg = Organization::query()->create([
        'name' => 'Other',
        'slug' => 'other-'.uniqid(),
    ]);
    $otherStore = Store::query()->create([
        'organization_id' => $otherOrg->id,
        'name' => 'Other Store',
        'slug' => 'other-store-'.uniqid(),
        'timezone' => 'Africa/Dar_es_Salaam',
    ]);
    $otherCategory = Category::query()->create([
        'store_id' => $otherStore->id,
        'name' => 'Other Cat',
        'position' => 1,
    ]);
    $foreignItem = CatalogItem::query()->create([
        'store_id' => $otherStore->id,
        'category_id' => $otherCategory->id,
        'name' => 'Foreign Item',
        'price_cents' => 500,
        'is_available' => true,
    ]);

    Sanctum::actingAs($user, ['*']);

    $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $foreignItem->id, 'quantity' => 1],
        ],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ])
        ->assertUnprocessable()
        ->assertJsonPath('code', 'invalid_catalog_items');

    $item->update(['is_available' => false]);

    $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ])
        ->assertUnprocessable()
        ->assertJsonPath('code', 'invalid_catalog_items');
});

test('checkout requires authentication', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();

    $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
    ])->assertUnauthorized();
});
