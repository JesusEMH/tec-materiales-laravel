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

Route::get('users', 'UserController@index');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('avatar/{filename}', 'UserController@getImage');
Route::get('detail/{id}', 'UserController@detail');
Route::put('update/{id}', 'UserController@update');
Route::post('upload', 'UserController@upload');


Route::group(['middleware' =>  'auth:api'], function(){
	Route::apiResource('usuarios', 'UsuarioController');
	Route::apiResource('grados', 'GradoController');
	Route::apiResource('cargos', 'CargoController');
	Route::apiResource('eventos', 'EventoController');
	Route::apiResource('espacios', 'EspacioController');
	Route::apiResource('mantenimientos', 'MantenimientoController');
	Route::apiResource('puestos', 'PuestoController');
	Route::apiResource('salidas', 'SalidaController');
	Route::apiResource('statusorders', 'StatusorderController');
	Route::apiResource('subdirections', 'SubdirectionController');
	Route::apiResource('vehiculos', 'VehiculoController');
	Route::apiResource('statusvehiculos', 'StatusvehiculoController');
	Route::apiResource('departamentos', 'DepartamentoController');	
	Route::apiResource('ubications', 'UbicationController');

	Route::delete('delete/{id}', 'UserController@delete');

	Route::get('eventos/asc', 'EventoController@getAntiguos');
	Route::get('eventos/month', 'EventoController@getPorStatus');
	Route::get('eventos/status', 'EventoController@getPorMes');
	
});



