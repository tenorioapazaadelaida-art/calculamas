<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CostoMateriaPrimaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_insumo' => 'required|string|max:150',
            'cantidad' => 'required|numeric|min:0',
            'porcentaje_merma' => 'required|numeric|min:0|max:100',
            'total_mp' => 'required|numeric|min:0',
            'id_producto' => 'required|exists:productos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_insumo.required' => 'El nombre del insumo es obligatorio',
            'nombre_insumo.string' => 'El nombre del insumo debe ser texto',
            'nombre_insumo.max' => 'El nombre del insumo no puede superar 150 caracteres',

            'cantidad.required' => 'La cantidad es obligatoria',
            'cantidad.numeric' => 'La cantidad debe ser numérica',
            'cantidad.min' => 'La cantidad no puede ser negativa',

            'porcentaje_merma.required' => 'El porcentaje de merma es obligatorio',
            'porcentaje_merma.numeric' => 'El porcentaje de merma debe ser numérico',
            'porcentaje_merma.min' => 'El porcentaje de merma no puede ser negativo',
            'porcentaje_merma.max' => 'El porcentaje de merma no puede ser mayor a 100',

            'total_mp.required' => 'El total de materia prima es obligatorio',
            'total_mp.numeric' => 'El total de materia prima debe ser numérico',
            'total_mp.min' => 'El total no puede ser negativo',

            'id_producto.required' => 'El producto es obligatorio',
            'id_producto.exists' => 'El producto seleccionado no existe',
        ];
    }
}
