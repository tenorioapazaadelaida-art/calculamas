<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // puedes colocar lógica de permisos si deseas
    }

    public function rules(): array
    {
        return [
            'stock_minimo' => 'required|integer|min:0',
            'stock_actual' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'id_producto' => 'required|exists:productos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'stock_minimo.required' => 'El stock mínimo es obligatorio',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero',

            'stock_actual.required' => 'El stock actual es obligatorio',
            'stock_actual.integer' => 'El stock actual debe ser un número entero',

            'precio_venta.required' => 'El precio de venta es obligatorio',
            'precio_venta.numeric' => 'El precio de venta debe ser numérico',

            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto seleccionado no existe',
        ];
    }
}
