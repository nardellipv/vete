<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Veterinarian;
use Faker\Generator as Faker;

$factory->define(Veterinarian::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);
    return [
        'name' => $title,
        'address' => $faker->address,
        'postalCode' => rand(100, 10000),
        'phone' => $faker->phoneNumber,
        'user_id' => rand(1, 10),
        'city_id' => rand(339, 356),
    ];
});
