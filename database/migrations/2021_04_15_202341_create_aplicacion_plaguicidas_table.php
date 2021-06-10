<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacionPlaguicidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion_plaguicidas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->foreignId('seccion_id')->references('id')->on('seccions');
            $table->date('fecha');
            $table->smallInteger('horas');
            $table->smallInteger('minutos');
            $table->string('tipoPlaguicida');
            $table->string('nombreComercial');
            $table->string('ingredienteActivo');
            $table->string('colorBanda');
            $table->string('dosisAplicada');
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
        Schema::dropIfExists('aplicacion_plaguicidas');
    }
}
