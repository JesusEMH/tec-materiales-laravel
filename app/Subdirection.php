<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdirection extends Model
{

    protected $fillable = [
        'subdireccion', 'subdirector'
    ];


    public function departamento(){
        return $this->hasMany('App\Departamento');
    }
}
