<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statusvehiculo extends Model
{
    protected $fillable = [
        'status'
    ];


    public function vehiculo(){
        return $this->hasMany('App\Vehiculo');
    }
}
