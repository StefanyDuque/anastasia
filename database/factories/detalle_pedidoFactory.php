<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detalle_pedido;
use Faker\Generator as Faker;

$factory->define(detalle_pedido::class, function (Faker $faker) {

    return [
        'id_pedido' => $faker->word,
        'codigo_producto' => $faker->word,
        'cantidad' => $faker->word,
        'fecha' => $faker->word,
        'vendedor' => $faker->word,
        'descuento' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
