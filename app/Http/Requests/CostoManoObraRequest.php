<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CostoManoObraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tarifa_hora' => 'required|numeric|min:0',
            'horas_por_unidad' => 'required|numeric|min:0',
            'id_producto' => 'required|exists:productos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'tarifa_hora.required' => 'La tarifa por hora es obligatoria',
            'tarifa_hora.numeric' => 'La tarifa por hora debe ser numérica',
            'tarifa_hora.min' => 'La tarifa por hora no puede ser negativa',

            'horas_por_unidad.required' => 'Las horas por unidad son obligatorias',
            'horas_por_unidad.numeric' => 'Las horas por unidad deben ser numéricas',
            'horas_por_unidad.min' => 'Las horas por unidad no pueden ser negativas',

            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto seleccionado no existe',
        ];
    }
}
