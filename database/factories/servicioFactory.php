<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\servicio;
use Faker\Generator as Faker;

$factory->define(servicio::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'tipo' => $faker->word,
        'valor' => $faker->word,
        'estatus' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
