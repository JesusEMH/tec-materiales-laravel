<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('cargos', 'CargoController');
Route::apiResource('departamentos', 'DepartamentoController');
Route::apiResource('grados', 'GradoController');
Route::apiResource('eventos', 'EventoController');
Route::apiResource('espacios', 'EspacioController');
Route::apiResource('mantenimientos', 'MantenimientoController');
Route::apiResource('puestos', 'PuestoController');
Route::apiResource('salidas', 'SalidaController');
Route::apiResource('status-orders', 'StatusorderController');
Route::apiResource('status-vehiculos', 'StatusvehiculoController');
Route::apiResource('subdirecciones', 'SubdirectionController');
Route::apiResource('ubicaciones', 'UbicationController');
Route::apiResource('usuarios', 'UsuarioController');
Route::apiResource('vehiculos', 'VehiculoController');

