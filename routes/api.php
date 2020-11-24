<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/usuarios', 'UserController@index');
Route::post('/usuarios/create', 'UserController@store');
Route::post('/usuarios/update', 'UserController@update');
Route::post('/usuarios/drop', 'UserController@destroy');
Route::post('/equipos/create', 'EquipoController@store');
Route::post('/equipos', 'EquipoController@index');
Route::post('/equipos/drop', 'EquipoController@destroy');
Route::post('/equipos/update', 'EquipoController@update');
Route::get('/maquinas', 'MaquinasController@index');
Route::post('/maquinas/create', 'MaquinasController@store');
Route::post('/maquinas/update', 'MaquinasController@update');
Route::post('/maquinas/drop', 'MaquinasController@destroy');
Route::post('/ordenes/drop', 'OrdenController@destroy');
Route::post('/consultas/fecha', 'UserController@fecha_consult');
Route::post('/consultas/maquina', 'UserController@mq_consult');
Route::post('/consultas/tb', 'UserController@tb_consult');
Route::post('/consultas/actividades', 'UserController@actividades_fecha');



