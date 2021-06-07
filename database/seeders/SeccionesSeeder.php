<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccions')->insert([
            'nombreSeccion' => 'V01',
            'cantidadPlantas' => 0,
            'propiedad_id' => 1,
            'user_id' => 1,
        ]);
    }
}
