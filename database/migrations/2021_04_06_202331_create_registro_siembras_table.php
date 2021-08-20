<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroSiembrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_siembras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('huerta_id')
                ->references('id')
                ->on('registro_propiedads');
            $table->foreignId('seccion_id')
                ->references('id')
                ->on('seccions');
            $table->foreignId('lote_id')
                ->references('id')
                ->on('calidad_plantas');
            $table->float('cantidadPlantas',);
            $table->date('fecha',);
            $table->float('distanciaPlanta',);
            $table->float('distanciaVesana',);
            $table->string('riego', 28);
            $table->smallInteger('costo')->default(0);
            $table->foreignId('empleado_id')
            ->references('id')
            ->on('empleados');
            $table->foreignId('user_id')
            ->references('id')
            ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_siembras');
    }
}
