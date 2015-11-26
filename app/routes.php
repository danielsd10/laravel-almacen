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

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/productos', function()
{
	return View::make('products');
});

Route::get('/categorias', 'CategoriaController@getCategorias');

Route::get('/categorias/crear', 'CategoriaController@crearCategorias');

Route::post('/categorias', 'CategoriaController@saveCategorias');

Route::get('/categorias/{id}', 'CategoriaController@getCategoria');