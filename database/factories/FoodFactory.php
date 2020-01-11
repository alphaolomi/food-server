<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {

    return [
        'title' => $faker->city,
        'subTitle' => $faker->text(),
        'price' => $faker->numberBetween(2000,15000),
        'rating' => $faker->randomDigitNotNull,
        'info' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
