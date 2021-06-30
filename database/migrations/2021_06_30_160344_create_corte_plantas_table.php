<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_plantas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->foreignId('seccion_id')->references('id')->on('seccions');
            $table->smallInteger('cantidad');
            $table->string('motivo')->nullable();
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
        Schema::dropIfExists('corte_plantas');
    }
}
