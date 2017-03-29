<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $fillable = [

        'fase_nombre','fase_estado','vehiculo_id',
    ];
}
