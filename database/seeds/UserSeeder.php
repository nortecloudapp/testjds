<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nombres' => 'Sergio Deyby',
            'apellidos' => 'Villanueva Esteves',
            'dni' => '72871899',
            'nacimiento' => Carbon::create('1992', '05', '07'),
            'celular' => '959039309',
            'avatar' => 'default.png',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
