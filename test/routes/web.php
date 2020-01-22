<?php

use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/verDescargas', 'DescargaController@show')->name('show');

Route::get('/about', function () {
    return view('about');
});

Auth::routes();
Route::post('/createDescarga', 'DescargaController@createDescarga')->name('createDescarga');
Route::get('/home', 'HomeController@showDownloads')->name('home');

Route::get('/descarga', 'DescargaController@index')->name('descarga');
//Ruta que va al controlador para ver el usuario.
Route::get('/VerUsuario/{id}', "UserFunction@ver", function(){
	return view('Functions.showUser');
});
//Ruta que muestra la vista para editar el usuario.
Route::get('/EditarUsuario/{id}', "UserFunction@show", function(){
	return view('Functions.editUser');
});
//Ruta que llama al controlador para editar al usuario.
Route::post('/EditarUsuario/{Id}', 'UserFunction@update');

//Ruta que llama al controlador y lo elimina
Route::get('/EliminarUsuario/{Id}', 'UserFunction@destroy');
Route::get('/update/{id}', 'DescargaController@update');
