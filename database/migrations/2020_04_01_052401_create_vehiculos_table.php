<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('vehiculo', 100);
            $table->string('marca', 100);
            $table->string('placas', 100);
            $table->unsignedBigInteger('status_id');
            $table->string('kilometraje', 100)->default('cero');

            $table->foreign('status_id')->references('id')->on('statusvehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
