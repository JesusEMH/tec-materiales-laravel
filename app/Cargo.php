<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    
    protected $fillable = [
        'cargo'
    ];

    public function puesto(){
        return $this->hasMany('App\Puesto');
    }
}
