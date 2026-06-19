<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoEmprendimientoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:255',

            'id_producto' => 'required|integer|exists:productos,id',

            'id_emprendimiento' => 'required|integer|exists:emprendimientos,id',
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',

            'id_producto.required' => 'El producto es obligatorio.',
            'id_producto.exists' => 'El producto no existe.',

            'id_emprendimiento.required' => 'El emprendimiento es obligatorio.',
            'id_emprendimiento.exists' => 'El emprendimiento no existe.',
        ];
    }
}
