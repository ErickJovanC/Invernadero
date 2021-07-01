<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptosGastosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concepto_gastos')->insert([
            'concepto' => 'Agua',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Luz',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Gasolina',
        ]);
        
        DB::table('concepto_gastos')->insert([
            'concepto' => 'Renta Maquinaria',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Mantenimiento Maquinaria',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Reparación Maquinaria',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Renta de Terreno',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Seguro Agricola',
        ]);

        DB::table('concepto_gastos')->insert([
            'concepto' => 'Seguro Social',
        ]);
    }
}
