<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Login;
use Faker\Generator as Faker;

$factory->define(Login::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
