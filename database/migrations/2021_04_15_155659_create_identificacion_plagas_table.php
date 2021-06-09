<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificacionPlagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identificacion_plagas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->foreignId('seccion_id')->references('id')->on('seccions');
            $table->string('periodoMonitoreo');
            $table->string('plaga');
            $table->string('unidadMuestreo');
            $table->string('cantidadEncontrada');
            $table->string('danioPlaga');
            $table->foreignId('empleado_id')->references('id')->on('empleados');
            $table->foreignId('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('identificacion_plagas');
    }
}
