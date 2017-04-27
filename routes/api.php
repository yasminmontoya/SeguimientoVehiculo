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

Route::get('vehiculos',         'api\VehiculoController@listAll');
Route::get('vehiculos/{id}',    'api\VehiculoController@listOne');
Route::post('vehiculos',        'api\VehiculoController@create');
Route::put('vehiculos/{id}',    'api\VehiculoController@update');
Route::delete('vehiculos/{id}', 'api\VehiculoController@delete');
