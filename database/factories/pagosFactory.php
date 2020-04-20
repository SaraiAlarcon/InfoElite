<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\pagos;
use Faker\Generator as Faker;

$factory->define(pagos::class, function (Faker $faker) {

    return [
        'idmatricula' => $faker->randomDigitNotNull,
        'numero' => $faker->word,
        'mes_pension' => $faker->word,
        'monto_pension' => $faker->word,
        'monto_matricula' => $faker->word,
        'monto_material' => $faker->word,
        'monto_copias' => $faker->word,
        'monto_actividades' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
