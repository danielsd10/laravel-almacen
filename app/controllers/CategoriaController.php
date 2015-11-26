<?php

class CategoriaController extends BaseController {

	public function getCategorias()
	{
		$categorias = Categoria::all();
		return View::make('categories', ['categorias' => $categorias]);
	}

	public function crearCategorias()
	{
		return View::make('categories_form');
	}

	public function getCategoria($id)
	{
		$categoria = Categoria::find($id);
		return Response::json($categoria);
	}

	public function saveCategorias()
	{
		$nombre = Input::get('nombre');
		$descripcion = Input::get('descripcion');

		$categoria = new Categoria();
		$categoria->nombre = $nombre;
		$categoria->descripcion = $descripcion;
		$categoria->save();

		Redirect::to("/categorias");
	}

}
