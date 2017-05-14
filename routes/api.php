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

Route::get('vehiculos',         'api\VehiculoController@listAll');
Route::get('vehiculos/{id}',    'api\VehiculoController@listOne');
Route::post('vehiculos',        'api\VehiculoController@create');
Route::put('vehiculos/{id}',    'api\VehiculoController@update');
Route::delete('vehiculos/{id}', 'api\VehiculoController@delete');

Route::get('mantenimientos',         'api\MantenimientoController@listAll');
Route::get('mantenimientos/{id}',    'api\MantenimientoController@listOne');

Route::get('fases',         'api\FaseController@listAll');
Route::get('fases/{id}',    'api\FaseController@listOne');

Route::get('usuarios',                 'api\UsuarioController@listAll');
Route::get('usuarios/{id}',            'api\UsuarioController@listOne');
Route::post('usuarios',                'api\UsuarioController@create');
Route::put('usuarios/{id}/contraseña', 'api\UsuarioController@update');
Route::post('usuarios/{id}',           'api\UsuarioController@delete');
