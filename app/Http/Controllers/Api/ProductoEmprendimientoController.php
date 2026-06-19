<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductoEmprendimiento;
use App\Http\Requests\ProductoEmprendimientoRequest;

class ProductoEmprendimientoController extends Controller
{
    /**
     * Listar registros
     */
    public function index()
    {
        $data = ProductoEmprendimiento::all();

        return response()->json($data, 200);
    }

    /**
     * Guardar registro
     */
    public function store(ProductoEmprendimientoRequest $request)
    {
        $data = ProductoEmprendimiento::create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Registro creado correctamente',
            'data' => $data
        ], 201);
    }

    /**
     * Mostrar un registro
     */
    public function show($id)
    {
        $data = ProductoEmprendimiento::findOrFail($id);

        return response()->json($data, 200);
    }

    /**
     * Actualizar registro
     */
    public function update(
        ProductoEmprendimientoRequest $request,
        $id
    ) {
        $item = ProductoEmprendimiento::findOrFail($id);

        $item->update(
            $request->validated()
        );

        return response()->json([
            'message' => 'Registro actualizado correctamente',
            'data' => $item
        ], 200);
    }

    /**
     * Eliminar registro
     */
    public function destroy($id)
    {
        $item = ProductoEmprendimiento::findOrFail($id);

        $item->delete();

        return response()->json([
            'message' => 'Registro eliminado correctamente'
        ], 200);
    }
}