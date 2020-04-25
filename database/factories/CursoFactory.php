<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use App\Ncurso;
use App\User;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'ncurso_id' => Ncurso::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
