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

	public function editarCategorias($id)
	{
		$categoria = Categoria::find($id);
		return View::make('categories_form', ['categoria' => $categoria]);
	}

	public function getCategoria($id)
	{
		$categoria = Categoria::find($id);
		return Response::json($categoria);
	}

	public function saveCategorias()
	{
		$id = Input::get('id');
		$nombre = Input::get('nombre');
		$descripcion = Input::get('descripcion');

		if(empty($id)) {
			$categoria = new Categoria();
		} else {
			$categoria = Categoria::find($id);
		}
		$categoria->nombre = $nombre;
		$categoria->descripcion = $descripcion;
		$categoria->save();

		return Redirect::to("/categorias");
	}

	public function deleteCategorias($id)
	{
		$categoria = Categoria::find($id);
		$categoria->delete();

		return Redirect::to("/categorias");
	}

}
