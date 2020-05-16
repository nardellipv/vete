<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Stock::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'provider' => $faker->company,
        'internalCode' => rand('100000', '999999'),
        'buyPrice' => rand('100', '9999'),
        'quantity' => rand('1', '500'),
        'expire' => $faker->dateTimeBetween('-180days','30days'),
        'slug' => Str::slug($name),
        'veterinarian_id' => rand('1', '10'),
        'category_id' => rand('1', '89'),
    ];
});
