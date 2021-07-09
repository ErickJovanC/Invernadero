<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombreRole' => 'Usuario',
        ]);

        DB::table('roles')->insert([
            'nombreRole' => 'Consultor',
        ]);

        DB::table('roles')->insert([
            'nombreRole' => 'Administrador',
        ]);
    }
}
