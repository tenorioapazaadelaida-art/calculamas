<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ComercialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:255',
            'responsable' => 'required|string|max:150',
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.string' => 'La descripción debe ser texto',
            'descripcion.max' => 'La descripción no puede superar 255 caracteres',

            'responsable.required' => 'El responsable es obligatorio',
            'responsable.string' => 'El responsable debe ser texto',
            'responsable.max' => 'El responsable no puede superar 150 caracteres',
        ];
    }
}
