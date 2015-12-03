@extends('template')

@section('contenido')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <span class="fa fa-tag"></span> @if(isset($producto)) Editar @else Nuevo @endif Producto
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Breadcrumb & Actions -->
        <div class="row">
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i> <a href="/">Inicio</a>
                    </li>
                    <li>
                        <i class="fa fa-tag"></i> <a href="/productos">Productos</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i> @if(isset($categoria)) Editar @else Nuevo @endif producto
                    </li>
                </ol>
            </div>
            <div class="col-md-1">
                <a href="/productos" class="btn btn-block btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
            </div>
            <div class="col-md-2">
                <button id="save" form="formProduct" type="submit" class="btn btn-block btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Guardar
                </button>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content -->
        <div class="row">
            <div class="col-md-6">
                <form id="formProduct" role="form" method="post" action="/productos">

                    <input type="hidden" name="id" value="@if(isset($producto)){{$producto->id}}@endif">

                    <div class="form-group">
                        <label>Código</label>
                        <input name="codigo" class="form-control" placeholder="PRD01" value="@if(isset($producto)){{$producto->codigo}}@endif">
                    </div>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" class="form-control" placeholder="Nombre de producto" value="@if(isset($producto)){{$producto->nombre}}@endif">
                    </div>

                    <div class="form-group">
                        <label>Marca</label>
                        <input name="marca" class="form-control" placeholder="Marca" value="@if(isset($producto)){{$producto->marca}}@endif">
                    </div>

                    <div class="form-group">
                        <label>Categorìa</label>
                        <select name="categoria_id" class="form-control">
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if(isset($producto) && $producto->categoria_id == $categoria->id) selected @endif>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <input name="descripcion" class="form-control" placeholder="Descripción" value="@if(isset($producto)){{$producto->descripcion}}@endif">
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <input name="precio" class="form-control" placeholder="0.00" value="@if(isset($producto)){{$producto->precio}}@endif">
                    </div>

                </form>
            </div>
        </row>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

@endsection