<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\usuario;
use Faker\Generator as Faker;

$factory->define(usuario::class, function (Faker $faker) {

    return [
        'username' => $faker->word,
        'password' => $faker->word,
        'nombre' => $faker->word,
        'apellido' => $faker->word,
        'identificacion' => $faker->word,
        'telefono' => $faker->word,
        'correo' => $faker->word,
        'fecha_nacimiento' => $faker->word,
        'estatus' => $faker->randomDigitNotNull,
        'rol' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
