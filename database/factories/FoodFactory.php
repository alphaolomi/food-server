<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'title' => $faker->word,
        'subTitle' => $faker->word,
        'thumbnail' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'comments' => $faker->randomDigitNotNull,
        'rating' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'showHome' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
