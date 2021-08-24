<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesCulturalesTable extends Migration
{
    public function up()
    {
        Schema::create('actividades_culturales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->foreignId('seccion_id')->references('id')->on('seccions');
            $table->date('fecha');
            $table->string('actividad', 35);
            $table->decimal('costo', 6, 1);
            $table->string('comentario');
            $table->foreignId('empleado_id')->references('id')->on('empleados');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actividades_culturales');
    }
}
