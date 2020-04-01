<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{

    protected $fillable = [
        'usuario_id', 'vehiculo_id', 'depto_solicitante', 'chofer', 'destino', 'descripcion', 'fecha', 'hora_salida', 'hora_llegada', 'status', 'imagen', 'verificado'
    ];

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo', 'vehiculo_id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'depto_solicitante');
    }

}
