<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HuertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registro_propiedads')->insert([
            'nombreHuerta' => 'El volcan',
            'estado_id' => 1,
            'municipio_id' => 2,
            'user_id' => 1,
        ]);

        DB::table('registro_propiedads')->insert([
            'nombreHuerta' => 'El Higero',
            'estado_id' => 1,
            'municipio_id' => 3,
            'user_id' => 2,
        ]);
    }
}
