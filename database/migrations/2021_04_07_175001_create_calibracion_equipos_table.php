<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalibracionEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibracion_equipos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('equipo');
            $table->string('producto');
            $table->smallInteger('recipiente');
            $table->smallInteger('pesoInicial');
            $table->smallInteger('pesoFinal');
            $table->smallInteger('gastoEquipo');
            $table->smallInteger('longitud');
            $table->smallInteger('ancho');
            $table->smallInteger('area');
            $table->smallInteger('gastoManzana');
            $table->string('comentario')->nullable();
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
        Schema::dropIfExists('calibracion_equipos');
    }
}
