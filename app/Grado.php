<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'estudio'
    ];

    public function puesto(){
        return $this->hasMany('App\Puesto');
    }
}
