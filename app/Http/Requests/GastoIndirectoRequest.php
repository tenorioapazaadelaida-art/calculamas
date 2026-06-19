<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GastoIndirectoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_producto' => 'required|exists:productos,id',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'tipo_gasto' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto no existe',

            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.string' => 'La descripción debe ser texto',
            'descripcion.max' => 'La descripción no puede superar 255 caracteres',

            'monto.required' => 'El monto es obligatorio',
            'monto.numeric' => 'El monto debe ser numérico',
            'monto.min' => 'El monto no puede ser negativo',

            'tipo_gasto.required' => 'El tipo de gasto es obligatorio',
            'tipo_gasto.string' => 'El tipo de gasto debe ser texto',
            'tipo_gasto.max' => 'El tipo de gasto no puede superar 100 caracteres',
        ];
    }
}
