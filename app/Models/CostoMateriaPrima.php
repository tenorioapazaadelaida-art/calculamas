<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoMateriaPrima extends Model
{
    protected $table = 'costo_materia_prima';

    protected $fillable = [
        'nombre_insumo',
        'cantidad',
        'porcentaje_merma',
        'total_mp',
        'id_producto'
    ];
}