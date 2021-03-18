<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_propiedads', function (Blueprint $table) {
            $table->id();

            $table->string('nombreHuerta', 30);
            $table->string('codigoRegistro', 30);
            $table->foreignId('estado_id')->
                references('id')->
                on('users');
            $table->foreignId('municipio_id')->
                references('id')->
                on('users');
            $table->string('colonia', 30);
            $table->string('calle', 30);
            $table->string('ubicacion', 30);

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
        Schema::dropIfExists('registro_propiedads');
    }
}
