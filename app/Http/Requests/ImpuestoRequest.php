<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ImpuestoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cantidad' => 'required|numeric|min:0',
            'motivo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'id_producto' => 'required|exists:productos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'cantidad.required' => 'La cantidad es obligatoria',
            'cantidad.numeric' => 'La cantidad debe ser numérica',
            'cantidad.min' => 'La cantidad no puede ser negativa',

            'motivo.required' => 'El motivo es obligatorio',
            'motivo.string' => 'El motivo debe ser texto',
            'motivo.max' => 'El motivo no puede superar los 255 caracteres',

            'fecha.required' => 'La fecha es obligatoria',
            'fecha.date' => 'La fecha no tiene un formato válido',

            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto seleccionado no existe',
        ];
    }
}
