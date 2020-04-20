<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\alumno;
use Faker\Generator as Faker;

$factory->define(alumno::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'apellidos' => $faker->word,
        'dni' => $faker->word,
        'sexo' => $faker->word,
        'fecha_nacimiento' => $faker->word,
        'direccion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
