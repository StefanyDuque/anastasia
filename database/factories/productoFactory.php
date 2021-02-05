<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\producto;
use Faker\Generator as Faker;

$factory->define(producto::class, function (Faker $faker) {

    return [
        'SKU' => $faker->word,
        'nombre' => $faker->word,
        'marca' => $faker->word,
        'precio' => $faker->word,
        'descripcion' => $faker->word,
        'stock' => $faker->word,
        'stock_anual' => $faker->word,
        'categoria' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
