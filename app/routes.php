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


Route::get('/categorias', 'CategoriaController@getCategorias');

Route::get('/categorias/crear', 'CategoriaController@crearCategorias');

Route::get('/categorias/editar/{id}', 'CategoriaController@editarCategorias');

Route::get('/categorias/eliminar/{id}', 'CategoriaController@deleteCategorias');

Route::post('/categorias', 'CategoriaController@saveCategorias');

Route::get('/categorias/{id}', 'CategoriaController@getCategoria');


Route::get('/productos', 'ProductoController@getProductos');

Route::get('/productos/crear', 'ProductoController@crearProductos');

Route::get('/productos/editar/{id}', 'ProductoController@editarProductos');

Route::get('/productos/eliminar/{id}', 'ProductoController@deleteProductos');

Route::post('/productos', 'ProductoController@saveProductos');

Route::get('/productos/{id}', 'ProductoController@getProducto');