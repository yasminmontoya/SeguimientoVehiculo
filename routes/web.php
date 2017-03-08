<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'PaginaController@inicio')->name('pagina.inicio');

Route::get('/servicio', 'PaginaController@servicio')->name('pagina.servicio');

Route::get('/contacto', 'PaginaController@contacto')->name('pagina.contacto');

Route::resource('/vehiculos', 'VehiculoController');

Route::get('/admins/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('/admins/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/area', 'AdminController@index')->name('admin.area');

Route::resource('/servicios', 'ServicioController');

Route::resource('/fases', 'FaseController');

