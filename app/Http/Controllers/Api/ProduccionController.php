<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use App\Http\Requests\ProduccionRequest;

class ProduccionController extends Controller
{
    /**
     * Listar registros
     */
    public function index()
    {
        $producciones = Produccion::all();

        return response()->json([
            'success' => true,
            'data' => $producciones
        ], 200);
    }

    /**
     * Crear registro
     */
    public function store(ProduccionRequest $request)
    {
        $produccion = Produccion::create(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'Registro creado correctamente',
            'data' => $produccion
        ], 201);
    }

    /**
     * Mostrar registro
     */
    public function show($id)
    {
        $produccion = Produccion::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $produccion
        ], 200);
    }

    /**
     * Actualizar registro
     */
    public function update(
        ProduccionRequest $request,
        $id
    ) {
        $produccion = Produccion::findOrFail($id);

        $produccion->update(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente',
            'data' => $produccion
        ], 200);
    }

    /**
     * Eliminar registro
     */
    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);

        $produccion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Eliminado correctamente'
        ], 200);
    }
}