<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosechas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->foreignId('huerta_id')->references('id')->on('registro_propiedads');
            $table->foreignId('seccion_id')->references('id')->on('seccions');
            $table->smallInteger('kilos');
            $table->smallInteger('merma')->nullable();
            $table->time('horaInicio')->nullable();
            $table->time('horaFin')->nullable();
            $table->smallInteger('tempFruta')->nullable();
            $table->smallInteger('tempSuelo')->nullable();
            $table->smallInteger('taras');
            $table->string('capacidadTara', 4)->nullable();
            $table->decimal('costo', 6, 1)->default(0);
            $table->float('precioVenta')->unsigned()->nullable();
            $table->foreignId('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('cosechas');
    }
}
