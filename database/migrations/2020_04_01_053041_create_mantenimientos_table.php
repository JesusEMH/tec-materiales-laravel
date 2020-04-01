<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('usuario_id');
            $table->string('tipo', 100)->default('interno');
            $table->unsignedBigInteger('servicio_id');
            $table->string('asignado_a', 100)->default('interno');
            $table->mediumText('trabajo_realizado', 255);
            $table->string('numero_control', 30)->nullable();
            $table->string('status', 100)->default('pendiente');
            $table->string('fecha', 50);
            $table->string('hora_inicio', 20);
            $table->string('hora_final', 20);
            $table->string('imagen', 255)->nullable();
            $table->unsignedBigInteger('depto_solicitante');
            $table->mediumText('equipo_proteccion', 255)->nullable();
            $table->boolean('verificado')->default(false);

            $table->foreign('servicio_id')->references('id')->on('statusorders');
            $table->foreign('depto_solicitante')->references('id')->on('departamentos');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
