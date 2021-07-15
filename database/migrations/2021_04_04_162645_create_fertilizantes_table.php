<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizantes', function (Blueprint $table) {
            $table->id();

            $table->string('nombreFertilizante', 50);
            $table->integer('N')->nullable();
            $table->integer('P2O5')->nullable();
            $table->integer('K2O')->nullable();
            $table->integer('Ca')->nullable();
            $table->integer('Mg')->nullable();
            $table->integer('S')->nullable();
            $table->string('microelementos', 30)->nullable();
            $table->string('macroelementos', 30)->nullable();
            $table->string('formula', 30)->nullable();
            $table->string('contenido', 30)->nullable();
            $table->string('comentario')->nullable();
            $table->foreignId('user_id')->
                references('id')-> 
                on('users')-> 
                comment('Usuario que registra el fertilizante');

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
        Schema::dropIfExists('fertilizantes');
    }
}
