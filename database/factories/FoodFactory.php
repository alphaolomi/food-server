<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'sub_name' => $this->faker->word(2),
            'is_active' => 1,
            'is_available' => 1,
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(0,5000),
            'created_at' => now() , //$this->faker->date('Y-m-d H:i:s'),
            'updated_at' => null,
            'deleted_at' => null,
        ];
    }
}
