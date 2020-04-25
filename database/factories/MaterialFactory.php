<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ncurso;
use App\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'ncurso_id' => Ncurso::all()->random()->id,
        'tag' => $faker->word,
        'url' => $faker->url,
    ];
});
