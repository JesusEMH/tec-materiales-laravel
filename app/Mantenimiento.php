<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $fillable = [
        'tipo', 'servicio_id', 'asignado_a', 'trabajo_realizado', 'numero_control', 'status', 'fecha', 'hora_inicio', 'hora_final', 'depto_solicitante', 'equipo_proteccion', 'verificado', 'imagen'
    ];

    public function servicio(){
        return $this->belongsTo('App\Statusorder', 'servicio_id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'depto_solicitante');
    }
}
