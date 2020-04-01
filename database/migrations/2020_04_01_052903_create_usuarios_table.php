<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('rol', 100)->default('usuario');
            $table->string('correo', 255)->unique();
            $table->string('contrasena', 255);
            $table->string('repetir_contrasena', 255);
            $table->string('numero_control', 30)->unique();
            $table->mediumText('descripcion', 255)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->string('clave_electronica', 255)->nullable(); 
            $table->string('remember_token', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
