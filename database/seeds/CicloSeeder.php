<?php

use App\Ciclo;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    public function run()
    {
        Ciclo::create([
            'nro_ciclo' => '1',
        ]);

        Ciclo::create([
            'nro_ciclo' => '2',
        ]);

        Ciclo::create([
            'nro_ciclo' => '3',
        ]);

        Ciclo::create([
            'nro_ciclo' => '4',
        ]);

        Ciclo::create([
            'nro_ciclo' => '5',
        ]);

        Ciclo::create([
            'nro_ciclo' => '6',
        ]);
    }
}
