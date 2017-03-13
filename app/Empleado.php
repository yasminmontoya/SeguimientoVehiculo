<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $guard= 'empleados';

    protected $fillable = [

        'name','apellidos','telefono','email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
