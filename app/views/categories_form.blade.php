@extends('template')

@section('contenido')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <span class="fa fa-tag"></span> @if(isset($categoria)) Editar @else Nueva @endif Categoría
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
                        <i class="fa fa-tag"></i> <a href="/categorias">Categorías</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i> @if(isset($categoria)) Editar @else Nueva @endif categoría
                    </li>
                </ol>
            </div>
            <div class="col-md-1">
                <a href="/categorias" class="btn btn-block btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
            </div>
            <div class="col-md-2">
                <button id="save" form="formCategory" type="submit" class="btn btn-block btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Guardar
                </button>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content -->
        <div class="row">
            <div class="col-md-6">
                <form id="formCategory" role="form" method="post" action="/categorias">

                    <input type="hidden" name="id" value="@if(isset($categoria)){{$categoria->id}}@endif">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" class="form-control" placeholder="Nombre de la categoría" value="@if(isset($categoria)){{$categoria->nombre}}@endif">
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <input name="descripcion" class="form-control" placeholder="Descripción de la categoría" value="@if(isset($categoria)){{$categoria->descripcion}}@endif">
                    </div>

                </form>
            </div>
        </row>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

@endsection