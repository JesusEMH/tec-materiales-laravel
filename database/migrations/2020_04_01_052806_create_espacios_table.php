<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('espacio',  100);
            $table->unsignedBigInteger('ubicacion_id');
            $table->boolean('status')->default(true);
            $table->string('imagen', 255)->nullable();

            $table->foreign('ubicacion_id')->references('id')->on('ubications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacios');
    }
}
