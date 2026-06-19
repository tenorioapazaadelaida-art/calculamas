<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [
        'stock_minimo',
        'stock_actual',
        'precio_venta',
        'id_producto'
    ];
}