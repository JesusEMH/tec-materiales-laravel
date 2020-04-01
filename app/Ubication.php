<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{

    protected $fillable = [
        'ubicacion', 'imagen'
    ];

    public function departamento(){
        return $this->hasMany('App\Departamento');
    }

    public function lugar(){
        return $this->hasMany('App\Espacio');
    }
}
