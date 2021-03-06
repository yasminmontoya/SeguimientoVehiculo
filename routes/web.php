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

Route::get('/empleados/login', 'Auth\EmpleadoLoginController@showLoginForm')->name('empleado.login');

Route::post('/empleados/login', 'Auth\EmpleadoLoginController@login')->name('empleado.login.submit');

Route::get('empleados/area', 'PaginaEmpleadosController@area')->name('empleado.area');

Route::get('empleados/area2/{id}', 'PaginaEmpleadosController@area2')->name('empleado.area2');

Route::post('empleados/area3/{id}', 'PaginaEmpleadosController@area3')->name('empleado.area3');

Route::resource('/empleados', 'EmpleadoController');

Route::get('fases/create/servicio/{id}', 'FaseController@create')->name('fases.create');

Route::get('fases/index/servicio/{id}', 'FaseController@index')->name('fases.index');

Route::resource('/mantenimientos', 'MantenimientoController');

Route::get('empleados/mantenimientos/vehiculo/{id}', 'MantenimientoController@index')->name('mantenimientos.index');

Route::get('empleados/mantenimientos/create/vehiculo/{id}', 'MantenimientoController@create')->name('mantenimientos.create');

Route::get('/dropdown','MantenimientoController@select');

Route::get('/mantenimientos/vehiculo/{id}', 'VehiculoController@showMantenimientos')->name('vehiculos.showMantenimientos');
