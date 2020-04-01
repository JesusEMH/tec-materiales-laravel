<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statusorder extends Model
{
   
    protected $fillable = [
        'status'
    ];


    public function mantenimiento(){
        return $this->hasMany('App\Mantenimiento');
    }
}
