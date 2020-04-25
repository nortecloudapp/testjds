<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ncurso;
use App\Nota;
use App\User;
use Faker\Generator as Faker;

$factory->define(Nota::class, function (Faker $faker) {
    return [
        'ncurso_id' => Ncurso::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'nro_nota' => $faker->numberBetween(0, 20),
    ];
});
