<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\sesion;
use Faker\Generator as Faker;

$factory->define(sesion::class, function (Faker $faker) {

    return [
        'fecha_inicio' => $faker->word,
        'fecha_final' => $faker->word,
        'id_usuario' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
