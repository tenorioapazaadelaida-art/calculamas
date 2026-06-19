<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GastoIndirecto extends Model
{
    protected $table = 'gastos_indirectos';

    protected $fillable = [
        'id_producto',
        'descripcion',
        'monto',
        'tipo_gasto'
    ];
}