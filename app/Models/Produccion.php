<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccion';

    protected $fillable = [
        'descripcion',
        'estado',
        'id_emprendimiento'
    ];
}