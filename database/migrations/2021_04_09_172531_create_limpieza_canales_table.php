<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimpiezaCanalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limpieza_canales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->date('fecha');
            $table->string('nombreCanal', 30);
            $table->smallInteger('longitud');
            $table->string('revestimiento', 8);
            $table->string('accionesRealizadas', 50);
            $table->text('observaciones')->nullable();
            $table->decimal('costo', 6, 1)->default(0)->nullable();
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
        Schema::dropIfExists('limpieza_canales');
    }
}
