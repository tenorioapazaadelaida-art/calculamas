<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProduccionRequest extends FormRequest
{
    /**
     * Autorizar request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación
     */
    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:255',

            'estado' => 'required|string|max:50',

            'id_emprendimiento' =>
                'required|integer|exists:emprendimientos,id',
        ];
    }

    /**
     * Mensajes personalizados
     */
    public function messages(): array
    {
        return [
            'descripcion.required' =>
                'La descripción es obligatoria.',

            'descripcion.string' =>
                'La descripción debe ser texto.',

            'descripcion.max' =>
                'La descripción no debe superar 255 caracteres.',

            'estado.required' =>
                'El estado es obligatorio.',

            'estado.string' =>
                'El estado debe ser texto.',

            'estado.max' =>
                'El estado no debe superar 50 caracteres.',

            'id_emprendimiento.required' =>
                'El emprendimiento es obligatorio.',

            'id_emprendimiento.integer' =>
                'El id del emprendimiento debe ser numérico.',

            'id_emprendimiento.exists' =>
                'El emprendimiento no existe.',
        ];
    }
}
