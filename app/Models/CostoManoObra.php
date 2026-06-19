<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoManoObra extends Model
{
    protected $table = 'costo_mano_obra';

    protected $fillable = [
        'tarifa_hora',
        'horas_por_unidad',
        'id_producto'
    ];
}