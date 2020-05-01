<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $dni = $faker->unique->numberBetween('10000000','99999999');
    return [
        'name' => $faker->name,
        'dni' => $dni,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'veterinarian_id' => rand(1, 10),
        'city_id' => rand(340, 356),
    ];
});
