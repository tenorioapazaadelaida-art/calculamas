<?php

namespace App\Services;

use App\Models\Producto;
use App\Models\CalculoFinal;

class CalculoFinalService
{
    public function calcular(int $productoId): CalculoFinal
    {
        $producto = Producto::with([
            'materiaPrima',
            'gastosIndirectos',
            'impuestos'
        ])->findOrFail($productoId);

        $materiaPrima = $producto->materiaPrima->sum('total_mp');
        $gastosIndirectos = $producto->gastosIndirectos->sum('monto');
        $impuestos = $producto->impuestos->sum('cantidad');

        $manoObra = 0;

        $costoProduccion = $materiaPrima + $manoObra;
        $costoComercializacion = $gastosIndirectos + $impuestos;
        $costoTotal = $costoProduccion + $costoComercializacion;

        $porcentajeGanancia = 30;
        $gananciaNeta = ($costoTotal * $porcentajeGanancia) / 100;

        $precioVenta = $costoTotal + $gananciaNeta;

        return CalculoFinal::updateOrCreate(
            ['id_producto' => $productoId],
            [
                'costo_produccion' => $costoProduccion,
                'costo_comercializacion' => $costoComercializacion,
                'costo_total_venta' => $costoTotal,
                'precio_venta_sugerido' => $precioVenta,
                'ganancia_neta' => $gananciaNeta,
                'porcentaje_ganancia' => $porcentajeGanancia
            ]
        );
    }
}