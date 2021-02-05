<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\categoria;
use Faker\Generator as Faker;

$factory->define(categoria::class, function (Faker $faker) {

    return [
        'slug' => $faker->word,
        'nombre' => $faker->word,
        'categoria_padre' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
