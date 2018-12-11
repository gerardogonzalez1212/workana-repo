<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are registrarUsuarioloaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio_contenido.inicio_contenido');
});

Route::post('usuario/registrar','UsuarioController@store');

Route::get('login', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function(){

	Route::post('empresa/actualizar','UsuarioController@updateEmpresa');
	Route::post('freelance/actualizar','UsuarioController@updateFreelance');
	Route::post('proyecto/nuevo','ProyectoController@store');
	Route::get('empresa/getInfo','UsuarioController@getInfo');
	// Route::get('freelance/getInfo','UsuarioController@getInfoFreelance');
	Route::get('proyecto/getProyectos','ProyectoController@getProyectosEmpresa');
	Route::get('proyecto/getProyectos2','ProyectoController@getProyectosEmpresa2');
	Route::get('proyecto/getProyectosFreelance','ProyectoController@getProyectosFreelance');
	Route::post('freelance/postular','ProyectoController@postular');


	Route::get('empresa', function () {
	    return view('empresa_contenido.empresa_contenido');
	})->name('empresa');

	Route::get('freelance', function () {
	    return view('freelance_contenido.freelance_contenido');
	})->name('freelance');
});

Route::post('login/entrar','Auth\LoginController@login')->name('login-entrar');
Route::post('logout','Auth\LoginController@logout')->name('logout');
