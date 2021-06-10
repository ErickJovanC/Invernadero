<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Empleados')->insert([
            'nombreEmpleado' => 'Peter',
            'apellidoEmpleado' => 'Parker',
            'sobrenombreEmpleado' => 'El hombre Araña',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('Empleados')->insert([
            'nombreEmpleado' => 'Bruno',
            'apellidoEmpleado' => 'Wayne',
            'sobrenombreEmpleado' => 'Batman',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('Empleados')->insert([
            'nombreEmpleado' => 'Clarck',
            'apellidoEmpleado' => 'Ken',
            'sobrenombreEmpleado' => 'Superman',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
