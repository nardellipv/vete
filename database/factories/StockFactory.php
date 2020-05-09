<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'provider' => $faker->company,
        'internalCode' => rand('100000', '999999'),
        'buyPrice' => rand('100', '9999'),
        'sellPrice' => rand('100', '9999'),
        'tax' => rand('0', '50'),
        'quantity' => rand('1', '500'),
        'expire' => $faker->dateTimeBetween('-180days','30days'),
        'veterinarian_id' => rand('1', '10'),
        'category_id' => rand('1', '89'),
    ];
});
