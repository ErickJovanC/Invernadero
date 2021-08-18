<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalidadPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidad_plantas', function (Blueprint $table) {
            $table->id();

            $table->date('fechaCorte');
            $table->date('fechaRecepcion');
            $table->string('origenPlanta');
            $table->smallInteger('cantidadPlantas');
            $table->smallInteger('plantadas')->default(0);
            $table->smallInteger('porPlantar');
            $table->string('variedadPlanta');
            $table->string('lote');
            $table->string('resistenciaPlagas')->nullable();
            $table->string('toleranciaPlagas')->nullable();
            $table->string('certificado')->nullable();
            $table->smallInteger('costo')->nullable();
            $table->foreignId('empleado_id')
                ->references('id')
                ->on('empleados');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            
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
        Schema::dropIfExists('calidad_plantas');
    }
}
