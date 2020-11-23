<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/trabajadores', function () {
    return view('trabajadores.trabajadores');
});
Route::get('/equipos', function () {
    return view('equipos.equipos');
});
Route::get('/maquinas', function () {
    return view('maquinas.maquinas');
});

Route::get('/actividades', function () {
    return view('actividades');
});

Route::get('/ordenes', 'OrdenController@index');
Route::get('/ordenes/crear', 'OrdenController@create');
Route::post('/ordenes/save', 'OrdenController@store');
Route::get('/ordenes/edit/{id}', 'OrdenController@edit');
Route::post('/ordenes/update', 'OrdenController@update');
Route::get('/consultas/fecha', 'UserController@fecha');
Route::get('/consultas/trabajador', 'UserController@tb');
Route::get('/consultas/maquinas', 'UserController@mq');
