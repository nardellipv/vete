<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Turn;
use Faker\Generator as Faker;

$factory->define(Turn::class, function (Faker $faker) {
    return [
        'motive' => $faker->text($maxNbChar = 100),
        'date' =>$faker->date('Y-m-d'),
        'hours' =>$faker->time('H:m'),
        'customer_id' => rand(1, 10),
        'patient_id' => rand(1, 10),
    ];
});
