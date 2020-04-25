<?php

use App\Programa;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    public function run()
    {
        Programa::create([
            'nombre_programa' => 'Computación e Informática',
        ]);

        Programa::create([
            'nombre_programa' => 'Laboratorio Clínico',
        ]);

        Programa::create([
            'nombre_programa' => 'Mecánica de Producción',
        ]);

        Programa::create([
            'nombre_programa' => 'Electrotecnia Industrial',
        ]);
    }
}
