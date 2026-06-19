<?php

namespace App\Http\Controllers\API;

use App\Models\Inventario;
use App\Http\Requests\InventarioRequest;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    public function index()
    {
        return response()->json(Inventario::all());
    }

    public function store(InventarioRequest $request)
    {
        $inventario = Inventario::create($request->validated());

        return response()->json($inventario, 201);
    }

    public function show($id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($inventario);
    }

    public function update(InventarioRequest $request, $id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $inventario->update($request->validated());

        return response()->json($inventario);
    }

    public function destroy($id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $inventario->delete();

        return response()->json(['message' => 'Eliminado correctamente']);
    }
}