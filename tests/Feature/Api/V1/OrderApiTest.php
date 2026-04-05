<?php

use App\Models\CatalogItem;
use App\Models\Store;
use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->seed(DemoDataSeeder::class);
});

test('user can fetch their order by id', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();
    $user = User::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $checkout = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
    ]);

    $checkout->assertCreated();
    $orderId = $checkout->json('order.id');

    $this->getJson("/api/v1/orders/{$orderId}")
        ->assertOk()
        ->assertJsonPath('order.id', $orderId)
        ->assertJsonStructure(['order' => ['id', 'status', 'lines', 'tickets', 'payments']]);
});

test('user cannot fetch another users order', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();
    $owner = User::factory()->create();

    Sanctum::actingAs($owner, ['*']);

    $checkout = $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
    ]);

    $orderId = $checkout->json('order.id');

    $other = User::factory()->create();
    Sanctum::actingAs($other, ['*']);

    $this->getJson("/api/v1/orders/{$orderId}")
        ->assertForbidden()
        ->assertJsonPath('message', 'Forbidden.');
});

test('order show requires authentication', function () {
    $this->getJson('/api/v1/orders/1')->assertUnauthorized();
});
