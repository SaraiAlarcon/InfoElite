<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\aula;
use Faker\Generator as Faker;

$factory->define(aula::class, function (Faker $faker) {

    return [
        'idgrado' => $faker->randomDigitNotNull,
        'seccion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
