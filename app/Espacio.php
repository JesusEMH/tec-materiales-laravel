<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
 
    protected $fillable = [
        'espacio', 'ubicacion_id', 'status', 'imagen'
    ];

    public function ubication(){
        return $this->belongsTo('App\Ubication', 'ubicacion_id');
    }
}
