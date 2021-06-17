<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Erick Jovan',
            'apellidoP' => 'De La Cruz',
            'apellidoM' => 'Cruz',
            'telefono' => '7352351512',
            'direccion' => 'Calvario 13, Barrio Santigo, Tetela del Volcán',
            'email' => 'erickjovan106@gmail.com',
            'foto' => 'erick.jpg',
            'password' => Hash::make('palmz22A'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
