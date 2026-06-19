<?php

namespace App\Http\Controllers\API;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Services\CostosService;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(
            Producto::with('usuario')->get()
        );
    }

    public function store(ProductoRequest $request)
    {
        $producto = Producto::create(
            $request->validated()
        );

        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::with([
            'usuario',
            'inventario',
            'gastosIndirectos',
            'manoObra',
            'comercial',
            'produto_Emprendimiento',
            'materiaPrima',
            'impuestos',
            'calculoFinal'
        ])->find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        return response()->json($producto);
    }

    public function update(ProductoRequest $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $producto->update(
            $request->validated()
        );

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'message' => 'Eliminado'
        ]);
    }
}