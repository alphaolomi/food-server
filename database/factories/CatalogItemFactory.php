<?php

namespace Database\Factories;

use App\Models\CatalogItem;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CatalogItem>
 */
class CatalogItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'store_id' => $store = Store::factory(),
            'category_id' => Category::factory()->for($store),
            'name' => fake()->words(2, true),
            'description' => fake()->optional()->sentence(),
            'price_cents' => fake()->numberBetween(500, 15000),
            'is_available' => true,
        ];
    }
}
