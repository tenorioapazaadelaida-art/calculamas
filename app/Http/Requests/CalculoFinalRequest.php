<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CalculoFinalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_producto' => 'required|exists:productos,id',

            'costo_produccion' => 'required|numeric|min:0',
            'costo_comercializacion' => 'required|numeric|min:0',
            'costo_total_venta' => 'required|numeric|min:0',

            'precio_venta_sugerido' => 'required|numeric|min:0',

            'ganancia_neta' => 'required|numeric',
            'porcentaje_ganancia' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto no existe',

            'costo_produccion.required' => 'El costo de producción es obligatorio',
            'costo_produccion.numeric' => 'El costo de producción debe ser numérico',
            'costo_produccion.min' => 'El costo de producción no puede ser negativo',

            'costo_comercializacion.required' => 'El costo de comercialización es obligatorio',
            'costo_comercializacion.numeric' => 'El costo de comercialización debe ser numérico',
            'costo_comercializacion.min' => 'El costo de comercialización no puede ser negativo',

            'costo_total_venta.required' => 'El costo total de venta es obligatorio',
            'costo_total_venta.numeric' => 'El costo total de venta debe ser numérico',
            'costo_total_venta.min' => 'El costo total de venta no puede ser negativo',

            'precio_venta_sugerido.required' => 'El precio de venta sugerido es obligatorio',
            'precio_venta_sugerido.numeric' => 'El precio de venta debe ser numérico',
            'precio_venta_sugerido.min' => 'El precio de venta no puede ser negativo',

            'ganancia_neta.required' => 'La ganancia neta es obligatoria',
            'ganancia_neta.numeric' => 'La ganancia neta debe ser numérica',

            'porcentaje_ganancia.required' => 'El porcentaje de ganancia es obligatorio',
            'porcentaje_ganancia.numeric' => 'El porcentaje de ganancia debe ser numérico',
            'porcentaje_ganancia.min' => 'El porcentaje no puede ser negativo',
            'porcentaje_ganancia.max' => 'El porcentaje no puede ser mayor a 100',
        ];
    }
}
