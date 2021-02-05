<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detalle_servicio;
use Faker\Generator as Faker;

$factory->define(detalle_servicio::class, function (Faker $faker) {

    return [
        'id_servicio' => $faker->word,
        'inicio' => $faker->word,
        'fin' => $faker->word,
        'asesor' => $faker->word,
        'cliente' => $faker->word,
        'estatus' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
