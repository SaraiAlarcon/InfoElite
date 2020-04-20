<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\apoderado;
use Faker\Generator as Faker;

$factory->define(apoderado::class, function (Faker $faker) {

    return [
        'nombres' => $faker->word,
        'apellidos' => $faker->word,
        'telefono' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
