<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('depto_solicitante');
            $table->string('chofer', 100)->nullable();
            $table->string('destino', 100)->nullable();
            $table->mediumText('descripcion', 255)->nullable();
            $table->string('fecha', 50);
            $table->string('hora_salida', 20);
            $table->string('hora_llegada', 20);
            $table->string('status', 100)->default('pendiente');
            $table->string('imagen', 255)->nullable();
            $table->boolean('verificado')->default(false);

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('depto_solicitante')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
