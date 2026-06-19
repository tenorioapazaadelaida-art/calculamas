<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CalculoFinal;
use App\Services\CalculoFinalService;

class CalculoFinalController extends Controller
{
    public function __construct(
        private CalculoFinalService $service
    ) {}

    // 🔥 GENERAR CÁLCULO
    public function calcular($id)
    {
        $calculo = $this->service->calcular($id);

        return response()->json([
            'status' => true,
            'message' => 'Cálculo generado correctamente',
            'data' => $calculo
        ]);
    }

    // 👁️ VER POR PRODUCTO
    public function show($id)
    {
        $calculo = CalculoFinal::where('id_producto', $id)->first();

        if (!$calculo) {
            return response()->json([
                'status' => false,
                'message' => 'No existe cálculo para este producto'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $calculo
        ]);
    }

    // 📊 LISTAR
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => CalculoFinal::all()
        ]);
    }

    // 🗑️ ELIMINAR
    public function destroy($id)
    {
        $calculo = CalculoFinal::where('id_producto', $id)->first();

        if (!$calculo) {
            return response()->json([
                'status' => false,
                'message' => 'No encontrado'
            ], 404);
        }

        $calculo->delete();

        return response()->json([
            'status' => true,
            'message' => 'Eliminado correctamente'
        ]);
    }
}