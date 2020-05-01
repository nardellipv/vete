<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'specie_id' => $faker->numberBetween('1','9'),
        'sex' => $faker->randomElement($array = array('Macho', 'Hembra')),
        'race' => $faker->word,
        'chip' => $faker->numberBetween('1000000','9999999'),
        'fur' => $faker->word,
        'weight' => $faker->numberBetween('10','100'),
        'name' => $name,
        'birthday' => $faker->date($format = 'Y-m-d'),
        'activity' => $faker->randomElement($array = array('Baja', 'Media','Alta')),
        'connivance' => $faker->randomElement($array = array('Si','No')),
        'castrated' => $faker->randomElement($array = array('Si', 'No')),
        'nutrition' => $faker->randomElement($array = array('Balanceado', 'Natural', 'Ambas')),
        'frequency' => $faker->randomElement($array = array('1', '2', '3', '4', '+4', 'Libre')),
        'comment' => $faker->text($maxNbChars = 500),
        'slug' => Str::slug($name),
        'customer_id' => rand(1, 10),
        'veterinarian_id' => rand(1, 10),
    ];
});



