<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacionFertilizanteOrganicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion_fertilizante_organicos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->foreignId('huerta_id')->
                references('id')->
                on('registro_propiedads');
            $table->foreignId('seccion_id')->
                references('id')->
                on('seccions');
            $table->integer('cantidadAplicada');
            $table->integer('superficie');
            $table->string('tipoFertilizante', 18);
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
        Schema::dropIfExists('aplicacion_fertilizante_organicos');
    }
}
