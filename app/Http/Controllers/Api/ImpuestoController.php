<?php

namespace App\Http\Controllers\API;

use App\Models\Impuesto;
use App\Http\Requests\ImpuestoRequest;
use App\Http\Controllers\Controller;
use App\Services\CostosService;

class ImpuestoController extends Controller
{
    public function index()
    {
        return response()->json(Impuesto::all());
    }

    public function store(ImpuestoRequest $request)
    {
        $imp = Impuesto::create($request->validated());

        // CostosService::recalcular($imp->id_producto);

        return response()->json($imp, 201);
    }

    public function show($id)
    {
        $imp = Impuesto::find($id);

        if (!$imp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($imp);
    }

    public function update(ImpuestoRequest $request, $id)
    {
        $imp = Impuesto::find($id);

        if (!$imp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $imp->update($request->validated());

        // CostosService::recalcular($imp->id_producto);

        return response()->json($imp);
    }

    public function destroy($id)
    {
        $imp = Impuesto::find($id);

        if (!$imp) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $idProducto = $imp->id_producto;

        $imp->delete();

        // CostosService::recalcular($idProducto);

        return response()->json(['message' => 'Eliminado']);
    }
}