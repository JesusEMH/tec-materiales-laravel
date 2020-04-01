<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    protected $fillable = [
        'usuario_id', 'depto_solicitante', 'evento', 'imagen', 'espacio_id','fecha', 'hora_inicio', 'hora_final', 'actividades' 'status', 'verificado'
    ];

    
    public function usuario(){
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'depto_solicitante');
    }
    public function espacio(){
        return $this->belongsTo('App\Espacio', 'espacio_id');
    }
}
