<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'usuario_id', 'departamento_id', 'cargo_id', 'abreviacion_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'usuario_id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'departamento_id');
    }

    public function cargo(){
        return $this->belongsTo('App\Cargo', 'cargo_id');
    }

}
