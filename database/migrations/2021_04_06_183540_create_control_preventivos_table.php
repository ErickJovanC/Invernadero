<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlPreventivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_preventivos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lote_id')-> 
                references('id')-> 
                on('calidad_plantas')-> 
                comment('Lote de plantas recibidas');
            $table->string('plagasPrevenir', 100);
            $table->date('fechaAccion');
            $table->integer('cantidadPlantas')->unsigned();
            $table->string('accionPreventiva', 300);
            $table->integer('costo')->default(0)->unsigned();
            $table->foreignId('responsable_id')-> 
                references('id')-> 
                on('empleados')-> 
                comment('Empleado responsable');
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
        Schema::dropIfExists('control_preventivos');
    }
}
