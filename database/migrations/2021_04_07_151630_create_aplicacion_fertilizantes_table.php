<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacionFertilizantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion_fertilizantes', function (Blueprint $table) {
            $table->id();

            $table->date('fechaAplicacion');
            $table->foreignId('huerta_id')->
                references('id')->
                on('registro_propiedads');
            $table->foreignId('seccion_id')->
                references('id')->
                on('seccions');
            $table->foreignId('fertilizante_id')->
                references('id')->
                on('fertilizantes');
            $table->integer('kilosHectarea');
            $table->string('metodoAplicacion', 11);
            $table->foreignId('empleado_id')->
                references('id')->
                on('empleados');
            $table->foreignId('user_id')->
                references('id')->
                on('users');

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
        Schema::dropIfExists('aplicacion_fertilizantes');
    }
}
