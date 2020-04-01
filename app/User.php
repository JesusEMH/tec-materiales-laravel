<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'repeat_password', 'control_number', 'surname', 'role', 'clave_electronica', 'image', 'phone', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function puesto(){
        return $this->hasMany('App\Puesto');
    }

    public function mantenimiento(){
        return $this->hasMany('App\Mantenimiento');
    }

    public function salida(){
        return $this->hasMany('App\Salida');
    }

    public function evento(){
        return $this->hasMany('App\Evento');
    }
}
