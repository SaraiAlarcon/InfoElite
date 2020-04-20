<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\matricula;
use Faker\Generator as Faker;

$factory->define(matricula::class, function (Faker $faker) {

    return [
        'idalumno' => $faker->randomDigitNotNull,
        'idaula' => $faker->randomDigitNotNull,
        'idapoderado' => $faker->randomDigitNotNull,
        'colegio_procedencia' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
