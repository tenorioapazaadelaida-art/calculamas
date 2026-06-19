<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CostoMateriaPrima;
use App\Models\GastoIndirecto;
use App\Models\Impuesto;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'descripcion',
        'precio_compra',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function materiaPrima()
    {
        return $this->hasMany(CostoMateriaPrima::class, 'id_producto');
    }

    public function gastosIndirectos()
    {
        return $this->hasMany(GastoIndirecto::class, 'id_producto');
    }

    public function impuestos()
    {
        return $this->hasMany(Impuesto::class, 'id_producto');
    }
}