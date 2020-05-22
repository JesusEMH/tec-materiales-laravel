<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    protected $fillable = [
        'telefono', 'departamento',  'correo', 'subdireccion_id'
    ];

    public function subdireccion(){
        return $this->belongsTo('App\Subdirection', 'subdireccion_id');
    }

    public function puesto(){
        return $this->hasMany('App\Puesto');
    }

    public function mantenimiento(){
        return $this->hasMany('App\Mantenimiento');
    }

    public function evento(){
        return $this->hasMany('App\Evento');
    }

    public function salida(){
        return $this->hasMany('App\Salida');
    }

}
