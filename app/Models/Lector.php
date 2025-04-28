<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'sexo',
        'correo',
        'celular',
    ];
}
