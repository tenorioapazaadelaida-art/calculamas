<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprendimiento extends Model
{
    protected $table = 'emprendimientos';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'tipo_emprendimiento',
        'fecha_registro'
    ];
}