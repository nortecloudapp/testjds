<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(CicloSeeder::class);
        $this->call(ProgramaSeeder::class);
    }
}
