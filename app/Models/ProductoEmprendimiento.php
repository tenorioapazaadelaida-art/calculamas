<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoEmprendimiento extends Model
{
    protected $table = 'producto_emprendimientos';

    protected $fillable = [
        'descripcion',
        'id_producto',
        'id_emprendimiento'
    ];
}