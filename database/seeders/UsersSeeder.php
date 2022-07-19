<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Usuario Comum', 'email' => 'comercial@astorbrindes.com.br', 'password' => bcrypt('astor@2022!*')]);
    }
}
