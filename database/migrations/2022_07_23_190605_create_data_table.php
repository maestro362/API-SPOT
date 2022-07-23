<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->integer('fid');
            $table->string('call_numero',60);
            $table->integer('codigo_postal');
            $table->string('colonia_predio');
            $table->decimal('superficie_terreno',10,2);
            $table->decimal('superficie_construccion',10,2);
            $table->string('uso_construccion',25);
            $table->integer('clave_rango_nivel');
            $table->integer('anio_construccion');
            $table->string('instalaciones_especiales',2);
            $table->decimal('valor_unitario_suelo',10,2);
            $table->decimal('valor_suelo',10,2);
            $table->string('clave_valor_unitario_suelo');
            $table->string('colonia_cumpliemiento');
            $table->string('alcaldia_cumplimiento');
            $table->decimal('subsidio',10,2);
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
        Schema::dropIfExists('data');
    }
}
