<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run()
    {
        Role::create([
            'nombre_rol' => 'admin',
        ]);

        Role::create([
            'nombre_rol' => 'docente',
        ]);

        Role::create([
            'nombre_rol' => 'alumno',
        ]);
    }
}
