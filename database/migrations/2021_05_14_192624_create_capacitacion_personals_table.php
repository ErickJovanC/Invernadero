<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitacion_personals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->date('fecha');
            $table->string('nombreCurso');
            $table->string('capacitador');
            $table->string('empresa');
            $table->string('tiempo');
            $table->smallInteger('costo')->unsigned();
            $table->string('empleados');
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
        Schema::dropIfExists('capacitacion_personals');
    }
}
