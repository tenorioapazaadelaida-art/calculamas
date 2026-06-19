<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    protected $table = 'impuesto';

    protected $fillable = [
        'cantidad',
        'motivo',
        'fecha',
        'id_producto'
    ];
}