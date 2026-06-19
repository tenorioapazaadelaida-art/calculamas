<?php

namespace App\Http\Controllers\API;

use App\Models\CostoManoObra;
use App\Http\Requests\CostoManoObraRequest;
use App\Http\Controllers\Controller;
use App\Services\CostosService;

class CostoManoObraController extends Controller
{
    public function index()
    {
        return response()->json(CostoManoObra::all());
    }

    public function store(CostoManoObraRequest $request)
    {
        $mano = CostoManoObra::create($request->validated());

        // CostosService::recalcular($mano->id_producto);

        return response()->json($mano, 201);
    }

    public function show($id)
    {
        $mano = CostoManoObra::find($id);

        if (!$mano) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($mano);
    }

    public function update(CostoManoObraRequest $request, $id)
    {
        $mano = CostoManoObra::find($id);

        if (!$mano) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $mano->update($request->validated());

        // CostosService::recalcular($mano->id_producto);

        return response()->json($mano);
    }

    public function destroy($id)
    {
        $mano = CostoManoObra::find($id);

        if (!$mano) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $idProducto = $mano->id_producto;

        $mano->delete();

        // CostosService::recalcular($idProducto);

        return response()->json(['message' => 'Eliminado']);
    }
}