<?php

use App\Models\CatalogItem;
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

test('checkout requires authentication', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $item = CatalogItem::query()->where('store_id', $store->id)->firstOrFail();

    $this->postJson("/api/v1/stores/{$store->slug}/checkout", [
        'lines' => [
            ['catalog_item_id' => $item->id, 'quantity' => 1],
        ],
    ])->assertUnauthorized();
});
