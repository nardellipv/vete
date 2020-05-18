<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChar = 50),
        'motive' => $faker->text($maxNbChar = 100),
        'date' =>$faker->dateTimeBetween('-10days','+10days'),
        'hours' =>$faker->time('H:m'),
        'priority' =>$faker->randomElement($array = array('Alta','Normal', 'Baja')),
        'status' =>$faker->randomElement($array = array('Completa','Pendiente')),
        'customer_id' => rand(1, 10),
        'patient_id' => rand(1, 10),
        'veterinarian_id' => rand(1, 10),
    ];
});
