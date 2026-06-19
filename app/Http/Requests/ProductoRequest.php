<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:255',

            'precio_compra' => 'required|numeric|min:0',

            'id_usuario' => 'required|exists:usuarios,id',
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',

            'precio_compra.required' => 'El precio es obligatorio.',
            'precio_compra.numeric' => 'El precio debe ser numérico.',
            'precio_compra.min' => 'El precio no puede ser negativo.',

            'id_usuario.required' => 'El usuario es obligatorio.',
            'id_usuario.exists' => 'El usuario no existe.',
        ];
    }
}
