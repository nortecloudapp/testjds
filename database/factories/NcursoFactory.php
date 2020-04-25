<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ciclo;
use App\Ncurso;
use App\Programa;
use Faker\Generator as Faker;

$factory->define(Ncurso::class, function (Faker $faker) {
    return [
        'nombre_curso' => $faker->word,
        'ciclo_id' => Ciclo::all()->random()->id,
        'programa_id' => Programa::all()->random()->id,
    ];
});
