<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_personals', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 30);
            $table->string('apellido_p', 30);
            $table->string('apellido_m', 30);
            $table->bigInteger('telefono');
            $table->string('direccion', 50);
            $table->string('foto')->nullable();
            $table->boolean('estaActivo')->default(0);
            $table->smallInteger('nivel')->default(1);
            $table->foreignId('user_id')->
                references('id')->
                on('users')->
                comment('Usuario del propietario');

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
        Schema::dropIfExists('registro_personals');
    }
}
