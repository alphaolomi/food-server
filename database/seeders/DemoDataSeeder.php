<?php

namespace Database\Seeders;

use App\Models\CatalogItem;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $org = Organization::query()->firstOrCreate(
            ['slug' => 'mloji-demo'],
            ['name' => 'Mloji Demo Organization'],
        );

        $store = Store::query()->firstOrCreate(
            ['slug' => 'dar-es-salaam-central'],
            [
                'organization_id' => $org->id,
                'name' => 'Dar es Salaam Central',
                'timezone' => 'Africa/Dar_es_Salaam',
            ],
        );

        $mains = Category::query()->firstOrCreate(
            ['store_id' => $store->id, 'name' => 'Mains'],
            ['position' => 1],
        );

        $drinks = Category::query()->firstOrCreate(
            ['store_id' => $store->id, 'name' => 'Drinks'],
            ['position' => 2],
        );

        $items = [
            ['category_id' => $mains->id, 'name' => 'Ugali & Samaki', 'price_cents' => 8500],
            ['category_id' => $mains->id, 'name' => 'Nyama Choma Plate', 'price_cents' => 12000],
            ['category_id' => $drinks->id, 'name' => 'Fresh Passion Juice', 'price_cents' => 2500],
        ];

        foreach ($items as $row) {
            CatalogItem::query()->firstOrCreate(
                [
                    'store_id' => $store->id,
                    'name' => $row['name'],
                ],
                [
                    'category_id' => $row['category_id'],
                    'description' => null,
                    'price_cents' => $row['price_cents'],
                    'is_available' => true,
                ],
            );
        }
    }
}
