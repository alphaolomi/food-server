<?php

use App\Enums\OrganizationRole;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Store;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('owner can manage categories for demo store', function () {
    $user = User::query()->where('email', 'test@example.com')->firstOrFail();
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();

    $this->actingAs($user)
        ->get(route('admin.stores.categories.index', $store))
        ->assertOk();

    $this->actingAs($user)
        ->post(route('admin.stores.categories.store', $store), [
            'name' => 'Sides',
            'position' => 9,
        ])
        ->assertRedirect(route('admin.stores.categories.index', $store));

    expect(Category::query()->where('store_id', $store->id)->where('name', 'Sides')->exists())->toBeTrue();
});

test('staff cannot create categories', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $org = $store->organization;

    $staff = User::factory()->create([
        'email' => 'staff-'.uniqid().'@example.com',
        'email_verified_at' => now(),
    ]);
    $org->users()->attach($staff->id, ['role' => OrganizationRole::Staff->value]);

    $this->actingAs($staff)
        ->post(route('admin.stores.categories.store', $store), [
            'name' => 'Blocked',
            'position' => 1,
        ])
        ->assertForbidden();
});

test('user outside organization cannot view catalog admin', function () {
    $store = Store::query()->where('slug', 'dar-es-salaam-central')->firstOrFail();
    $outsider = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $this->actingAs($outsider)
        ->get(route('admin.stores.categories.index', $store))
        ->assertForbidden();
});

test('stores index lists only member organizations', function () {
    $user = User::query()->where('email', 'test@example.com')->firstOrFail();

    $otherOrg = Organization::query()->create([
        'name' => 'Other Org',
        'slug' => 'other-org-'.uniqid(),
    ]);
    Store::query()->create([
        'organization_id' => $otherOrg->id,
        'name' => 'Hidden Store',
        'slug' => 'hidden-'.uniqid(),
    ]);

    $this->actingAs($user)
        ->get(route('admin.stores.index'))
        ->assertOk()
        ->assertSee('Dar es Salaam Central', false)
        ->assertDontSee('Hidden Store', false);
});
