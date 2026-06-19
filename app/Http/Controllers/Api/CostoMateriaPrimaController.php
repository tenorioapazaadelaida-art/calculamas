<?php

namespace App\Http\Controllers\API;

use App\Models\CostoMateriaPrima;
use App\Http\Requests\CostoMateriaPrimaRequest;
use App\Http\Controllers\Controller;
use App\Services\CostosService;

class CostoMateriaPrimaController extends Controller
{
    public function index()
    {
        return response()->json(CostoMateriaPrima::all());
    }

    public function store(CostoMateriaPrimaRequest $request)
    {
        $mp = CostoMateriaPrima::create($request->validated());

        // CostosService::recalcular($mp->id_producto);

        return response()->json($mp, 201);
    }

    public function show($id)
    {
        $mp = CostoMateriaPrima::find($id);

        if (!$mp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($mp);
    }

    public function update(CostoMateriaPrimaRequest $request, $id)
    {
        $mp = CostoMateriaPrima::find($id);

        if (!$mp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $mp->update($request->validated());

        // CostosService::recalcular($mp->id_producto);

        return response()->json($mp);
    }

    public function destroy($id)
    {
        $mp = CostoMateriaPrima::find($id);

        if (!$mp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $idProducto = $mp->id_producto;

        $mp->delete();

        // CostosService::recalcular($idProducto);

        return response()->json(['message' => 'Eliminado']);
    }
}