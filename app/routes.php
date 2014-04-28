<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//gestion de usuarios
// Nos mostrará el formulario de login.
Route::get('/login', 'UserController@get_login');
// Validamos los datos de inicio de sesión.
Route::post('/login', 'UserController@post_login');
// Esta ruta nos servirá para cerrar sesión.
Route::get('/logout', 'UserController@logout');
// Panel del administrador.
Route::get('/paneladmin', 'UserController@panel_admin');

Route::get('/usuarios/', 'UserController@index');//crear usuario
Route::get('/usuarios/create', 'UserController@create');//crear usuario
Route::post('/usuarios/create', 'UserController@store');//procesar la creacion de usuario
Route::get('/usuarios/{id}', 'UserController@show');//Visualizar info del usuario
Route::get('/usuarios/{id}/edit', 'UserController@edit');//Editar usuario
Route::post('/usuarios/{id}/edit', 'UserController@update');//procesar la modificacion
Route::get('/usuarios/delete/{id}', 'UserController@destroy');//eliminar usuario

