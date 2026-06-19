<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\InventarioController;
use App\Http\Controllers\API\EmprendimientoController;
use App\Http\Controllers\Api\ProduccionController;
use App\Http\Controllers\API\GastoIndirectoController;
use App\Http\Controllers\API\CostoManoObraController;
use App\Http\Controllers\API\CostoMateriaPrimaController;
use App\Http\Controllers\API\ImpuestoController;
use App\Http\Controllers\API\ComercialController;
use App\Http\Controllers\API\ProductoEmprendimientoController;
use App\Http\Controllers\API\CalculoFinalController;



/*
|--------------------------------------------------------------------------
| AUTH USER (SANCTUM)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| USUARIOS
|--------------------------------------------------------------------------
*/

Route::get('usuarios', [UsuarioController::class, 'index']);
Route::post('usuarios', [UsuarioController::class, 'store']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| PRODUCTOS
|--------------------------------------------------------------------------
*/

Route::get('productos', [ProductoController::class, 'index']);
Route::post('productos', [ProductoController::class, 'store']);
Route::get('productos/{id}', [ProductoController::class, 'show']);
Route::put('productos/{id}', [ProductoController::class, 'update']);
Route::delete('productos/{id}', [ProductoController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| INVENTARIOS
|--------------------------------------------------------------------------
*/

Route::get('inventarios', [InventarioController::class, 'index']);
Route::post('inventarios', [InventarioController::class, 'store']);
Route::get('inventarios/{id}', [InventarioController::class, 'show']);
Route::put('inventarios/{id}', [InventarioController::class, 'update']);
Route::delete('inventarios/{id}', [InventarioController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| EMPRENDIMIENTOS
|--------------------------------------------------------------------------
*/

Route::get('emprendimientos', [EmprendimientoController::class, 'index']);
Route::post('emprendimientos', [EmprendimientoController::class, 'store']);
Route::get('emprendimientos/{id}', [EmprendimientoController::class, 'show']);
Route::put('emprendimientos/{id}', [EmprendimientoController::class, 'update']);
Route::delete('emprendimientos/{id}', [EmprendimientoController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| GASTOS INDIRECTOS
|--------------------------------------------------------------------------
*/

Route::get('gastos-indirectos', [GastoIndirectoController::class, 'index']);
Route::post('gastos-indirectos', [GastoIndirectoController::class, 'store']);
Route::get('gastos-indirectos/{id}', [GastoIndirectoController::class, 'show']);
Route::put('gastos-indirectos/{id}', [GastoIndirectoController::class, 'update']);
Route::delete('gastos-indirectos/{id}', [GastoIndirectoController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| MANO DE OBRA
|--------------------------------------------------------------------------
*/

Route::get('mano-obra', [CostoManoObraController::class, 'index']);
Route::post('mano-obra', [CostoManoObraController::class, 'store']);
Route::get('mano-obra/{id}', [CostoManoObraController::class, 'show']);
Route::put('mano-obra/{id}', [CostoManoObraController::class, 'update']);
Route::delete('mano-obra/{id}', [CostoManoObraController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| MATERIA PRIMA
|--------------------------------------------------------------------------
*/

Route::get('materia-prima', [CostoMateriaPrimaController::class, 'index']);
Route::post('materia-prima', [CostoMateriaPrimaController::class, 'store']);
Route::get('materia-prima/{id}', [CostoMateriaPrimaController::class, 'show']);
Route::put('materia-prima/{id}', [CostoMateriaPrimaController::class, 'update']);
Route::delete('materia-prima/{id}', [CostoMateriaPrimaController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| produccion
|--------------------------------------------------------------------------
*/
Route::get('produccion', [ProduccionController::class, 'index']);
Route::post('produccion', [ProduccionController::class, 'store']);
Route::get('produccion/{id}', [ProduccionController::class, 'show']);
Route::put('produccion/{id}', [ProduccionController::class, 'update']);
Route::delete('produccion/{id}', [ProduccionController::class, 'destroy']);

Route::get('impuestos', [ImpuestoController::class, 'index']);
Route::post('impuestos', [ImpuestoController::class, 'store']);
Route::get('impuestos/{id}', [ImpuestoController::class, 'show']);
Route::put('impuestos/{id}', [ImpuestoController::class, 'update']);
Route::delete('impuestos/{id}', [ImpuestoController::class, 'destroy']);

Route::get('comercial', [ComercialController::class, 'index']);
Route::post('comercial', [ComercialController::class, 'store']);
Route::get('comercial/{id}', [ComercialController::class, 'show']);
Route::put('comercial/{id}', [ComercialController::class, 'update']);
Route::delete('comercial/{id}', [ComercialController::class, 'destroy']);

Route::get('producto-emprendimientos', [ProductoEmprendimientoController::class, 'index']);
Route::post('producto-emprendimientos', [ProductoEmprendimientoController::class, 'store']);
Route::get('producto-emprendimientos/{id}', [ProductoEmprendimientoController::class, 'show']);
Route::put('producto-emprendimientos/{id}', [ProductoEmprendimientoController::class, 'update']);
Route::delete('producto-emprendimientos/{id}', [ProductoEmprendimientoController::class, 'destroy']);
Route::get('calculo-final', [CalculoFinalController::class, 'index']);
Route::get('calculo-final/{id}', [CalculoFinalController::class, 'calcular']);
Route::get('calculo-final-show/{id}', [CalculoFinalController::class, 'show']);
Route::delete('calculo-final/{id}', [CalculoFinalController::class, 'destroy']);