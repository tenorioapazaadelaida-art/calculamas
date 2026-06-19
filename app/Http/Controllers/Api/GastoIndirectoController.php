<?php

namespace App\Http\Controllers\API;

use App\Models\GastoIndirecto;
use App\Http\Requests\GastoIndirectoRequest;
use App\Http\Controllers\Controller;
use App\Services\CostosService;

class GastoIndirectoController extends Controller
{
    public function index()
    {
        return response()->json(GastoIndirecto::all());
    }

    public function store(GastoIndirectoRequest $request)
    {
        $gasto = GastoIndirecto::create($request->validated());

        // CostosService::recalcular($gasto->id_producto);

        return response()->json($gasto, 201);
    }

    public function show($id)
    {
        $gasto = GastoIndirecto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($gasto);
    }

    public function update(GastoIndirectoRequest $request, $id)
    {
        $gasto = GastoIndirecto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $gasto->update($request->validated());

        // CostosService::recalcular($gasto->id_producto);

        return response()->json($gasto);
    }

    public function destroy($id)
    {
        $gasto = GastoIndirecto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $idProducto = $gasto->id_producto;

        $gasto->delete();

        // CostosService::recalcular($idProducto);

        return response()->json(['message' => 'Eliminado']);
    }
}