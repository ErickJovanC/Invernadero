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
            $table->string('variedadPlanta');
            $table->string('lote');
            $table->string('resistenciaPlagas');
            $table->string('toleranciaPlagas');
            $table->string('certificado');
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
