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
            $table->string('codigoRegistro', 30)->nullable();
            $table->foreignId('estado_id')->
                references('id')->
                on('estados');
            $table->foreignId('municipio_id')->
                references('id')->
                on('municipios');
            $table->string('colonia', 30)->nullable();
            $table->string('calle', 30)->nullable();
            $table->string('comunidad', 30)->nullable();
            $table->string('ubicacion', 50)->nullable();
            $table->foreignId('user_id')-> 
                references('id')-> 
                on('users')-> 
                comment('Usuario que crea la receta');

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
