<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {

    return [
        'title' => $faker->city,
        'subTitle' => $faker->word,
        'info' => $faker->text,
        'price' => $faker->numberBetween(1000,15000),
        'rating' => $faker->numberBetween(1,5),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});
