<?php

class ApiController extends BaseController {

	public function getCategorias()
	{
		$categorias = Categoria::all();
		return Response::json($categorias);
	}

	public function getProductos()
	{
		$filtro_categoria = Input::get("categoria");
		if(!empty($filtro_categoria)) {
			$productos = Producto::with("categoria")->where('categoria_id', '=', $filtro_categoria)->get();
		} else {
			$productos = Producto::with("categoria")->all();
		}
		return Response::json($productos);
	}

}
