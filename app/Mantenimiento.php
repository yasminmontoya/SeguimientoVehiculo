<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $fillable = [

        'fase_id','estado','vehiculo_id',
    ];
}
