<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\pedido;
use Faker\Generator as Faker;

$factory->define(pedido::class, function (Faker $faker) {

    return [
        'fecha' => $faker->word,
        'direccion' => $faker->word,
        'fecha_envio' => $faker->word,
        'comprador' => $faker->word,
        'estatus' => $faker->randomDigitNotNull,
        'items' => $faker->word,
        'total' => $faker->word
    ];
});
