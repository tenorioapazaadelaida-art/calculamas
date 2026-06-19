<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculoFinal extends Model
{
    protected $table = 'calculo_final';

    protected $primaryKey = 'id_calculo';

    public $timestamps = true;

    protected $fillable = [
        'id_producto',
        'costo_produccion',
        'costo_comercializacion',
        'costo_total_venta',
        'precio_venta_sugerido',
        'ganancia_neta',
        'porcentaje_ganancia'
    ];
}