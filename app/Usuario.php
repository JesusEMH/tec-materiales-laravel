<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        'nombre', 'apellidos', 'numero_control', 'correo', 'contrasena', 'repetir_contrasena', 'descripcion', 'telefono', 'imagen', 'clave_electronica', 'rol', 'remember_token'
    ];


}
