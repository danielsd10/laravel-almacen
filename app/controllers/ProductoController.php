<?php

class ProductoController extends BaseController {

	public function getProductos()
	{
		$productos = Producto::all();
		return View::make('products', ['productos' => $productos]);
	}

	public function crearProductos()
	{
		$categorias = Categoria::all();
		return View::make('products_form', ['categorias' => $categorias]);
	}

	public function editarProductos($id)
	{
		$categorias = Categoria::all();
		$producto = Producto::find($id);
		return View::make('products_form', ['categorias' => $categorias, 'producto' => $producto]);
	}

	public function getProducto($id)
	{
		$producto = Producto::find($id);
		return Response::json($producto);
	}

	public function saveProductos()
	{
		$id = Input::get('id');
		$codigo = Input::get('codigo');
		$nombre = Input::get('nombre');
		$marca = Input::get('marca');
		$descripcion = Input::get('descripcion');
		$unidad = Input::get('unidad_id');
		$categoria = Input::get('categoria_id');
		$precio = Input::get('precio');

		if(empty($id)) {
			$producto = new Producto();
		} else {
			$producto = Producto::find($id);
		}
		$producto->nombre = $nombre;
		$producto->codigo = $codigo;
		$producto->descripcion = $descripcion;
		$producto->marca = $marca;
		//$producto->unidad_id = $unidad;
		$producto->categoria_id = $categoria;
		$producto->unidad_id = "UND";
		$producto->precio = $precio;
		$producto->save();

		return Redirect::to("/productos");
	}

	public function deleteProductos($id)
	{
		$producto = Producto::find($id);
		$producto->delete();

		return Redirect::to("/productos");
	}

}
