<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    
    protected $fillable = [
        'vehiculo', 'marca', 'placas', 'status_id', 'kilometraje'
    ];

    public function status(){
        return $this->belongsTo('App\Statusvehiculo', 'status_id');
    }

    public function salida(){
        return $this->hasMany('App\Salida');
    }
}
