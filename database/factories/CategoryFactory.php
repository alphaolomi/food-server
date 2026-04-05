<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'name' => fake()->randomElement(['Mains', 'Sides', 'Drinks', 'Breakfast']),
            'position' => fake()->numberBetween(0, 10),
        ];
    }
}
