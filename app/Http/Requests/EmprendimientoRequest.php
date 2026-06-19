<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmprendimientoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:150',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'tipo_emprendimiento' => 'required|string|max:100',
            'fecha_registro' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.string' => 'El nombre debe ser texto',
            'nombre.max' => 'El nombre no puede superar 150 caracteres',

            'direccion.required' => 'La dirección es obligatoria',
            'direccion.string' => 'La dirección debe ser texto',
            'direccion.max' => 'La dirección no puede superar 255 caracteres',

            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.string' => 'El teléfono debe ser texto',
            'telefono.max' => 'El teléfono no puede superar 20 caracteres',

            'tipo_emprendimiento.required' => 'El tipo de emprendimiento es obligatorio',
            'tipo_emprendimiento.string' => 'El tipo de emprendimiento debe ser texto',
            'tipo_emprendimiento.max' => 'El tipo de emprendimiento no puede superar 100 caracteres',

            'fecha_registro.required' => 'La fecha de registro es obligatoria',
            'fecha_registro.date' => 'La fecha de registro no es válida',
        ];
    }
}
