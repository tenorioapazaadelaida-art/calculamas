<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComercialRequest;
use App\Models\Comercial;

class ComercialController extends Controller
{
    public function index()
    {
        return response()->json(Comercial::all());
    }

    public function store(ComercialRequest $request)
    {
        $comercial = Comercial::create($request->validated());

        return response()->json($comercial, 201);
    }

    public function show($id)
    {
        $comercial = Comercial::find($id);

        if (!$comercial) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($comercial);
    }

    public function update(ComercialRequest $request, $id)
    {
        $comercial = Comercial::find($id);

        if (!$comercial) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $comercial->update($request->validated());

        return response()->json($comercial);
    }

    public function destroy($id)
    {
        $deleted = Comercial::destroy($id);

        if ($deleted === 0) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json(['message' => 'Eliminado']);
    }
}