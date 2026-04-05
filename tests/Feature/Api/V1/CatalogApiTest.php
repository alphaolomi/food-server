<?php

use Database\Seeders\DemoDataSeeder;

beforeEach(function () {
    $this->seed(DemoDataSeeder::class);
});

test('catalog returns store and categories', function () {
    $this->getJson('/api/v1/stores/dar-es-salaam-central/catalog')
        ->assertOk()
        ->assertJsonPath('store.slug', 'dar-es-salaam-central')
        ->assertJsonStructure([
            'store' => ['id', 'name', 'slug', 'timezone'],
            'categories' => [
                '*' => ['id', 'name', 'position', 'items'],
            ],
        ]);
});

test('catalog returns 404 for unknown store', function () {
    $this->getJson('/api/v1/stores/unknown-store/catalog')
        ->assertNotFound()
        ->assertJsonPath('code', 'not_found');
});

test('stores directory is paginated', function () {
    $this->seed(DemoDataSeeder::class);

    $this->getJson('/api/v1/stores?per_page=5')
        ->assertOk()
        ->assertJsonStructure(['data', 'links', 'meta']);
});
