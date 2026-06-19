<?php

namespace App\Http\Controllers\API;

use App\Models\Emprendimiento;
use App\Http\Requests\EmprendimientoRequest;
use App\Http\Controllers\Controller;

class EmprendimientoController extends Controller
{
    public function index()
    {
        return response()->json(Emprendimiento::all());
    }

    public function store(EmprendimientoRequest $request)
    {
        $emprendimiento = Emprendimiento::create($request->validated());

        return response()->json($emprendimiento, 201);
    }

    public function show($id)
    {
        $item = Emprendimiento::find($id);

        if (!$item) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($item);
    }

    public function update(EmprendimientoRequest $request, $id)
    {
        $item = Emprendimiento::find($id);

        if (!$item) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $item->update($request->validated());

        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Emprendimiento::find($id);

        if (!$item) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Eliminado']);
    }
}