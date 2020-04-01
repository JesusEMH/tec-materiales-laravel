<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('evento', 100);
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('depto_solicitante');
            $table->unsignedBigInteger('espacio_id');
            $table->string('fecha', 50);
            $table->string('hora_inicio', 20);
            $table->string('hora_final', 20);
            $table->mediumText('actividades', 255)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->string('status',100)->default('pendiente');
            $table->boolean('verificado')->default(false);


            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('depto_solicitante')->references('id')->on('departamentos');
            $table->foreign('espacio_id')->references('id')->on('espacios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
