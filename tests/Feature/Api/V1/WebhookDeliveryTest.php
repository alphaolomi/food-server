<?php

use App\Models\CatalogItem;
use App\Models\Organization;
use App\Models\Store;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
    Http::fake();
});

test('order confirmed sends signed webhook with verifiable HMAC', function () {
    $user = User::query()->where('email', 'test@example.com')->firstOrFail();
    $org = Organization::query()->where('slug', 'mloji-demo')->firstOrFail();
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();

    Sanctum::actingAs($user, ['*']);

    $hook = $this->postJson('/api/v1/webhook-subscriptions', [
        'organization_id' => $org->id,
        'url' => 'https://partner.example/hooks/mloji',
        'events' => ['order.confirmed'],
    ]);

    $hook->assertCreated();
    $secret = $hook->json('secret');

    $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [['catalog_item_id' => $item->id, 'quantity' => 1]],
        'fulfillment_type' => 'pickup',
        'payment_provider' => 'tz_mobile_money_stub',
    ])->assertCreated();

    Http::assertSentCount(1);

    Http::assertSent(function ($request) use ($secret) {
        if ($request->url() !== 'https://partner.example/hooks/mloji') {
            return false;
        }

        $body = $request->body();
        $sigHeaders = $request->header('X-Mloji-Signature');
        $eventHeaders = $request->header('X-Mloji-Event');
        $sig = $sigHeaders[0] ?? null;
        $event = $eventHeaders[0] ?? null;

        if (! is_string($body) || ! is_string($sig) || $event !== 'order.confirmed') {
            return false;
        }

        return hash_equals(hash_hmac('sha256', $body, $secret), $sig);
    });
});
