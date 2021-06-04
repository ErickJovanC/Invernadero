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
            $table->integer('N');
            $table->integer('P2O5');
            $table->integer('K2O');
            $table->integer('Ca');
            $table->integer('Mg');
            $table->integer('S');
            $table->string('micronutrientes', 30);
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
