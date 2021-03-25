<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparacionSuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparacion_suelos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('huerta_id')
                ->references('id')
                ->on('registro_propiedads');
            $table->foreignId('seccion_id')
                ->references('id')
                ->on('seccions');
            $table->string('labor', 10);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->float('horasMaquinaria');
            $table->float('costoHora');
            $table->float('costoOperacion');
            $table->string('metodoUtilizado', 8);
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
        Schema::dropIfExists('preparacion_suelos');
    }
}
