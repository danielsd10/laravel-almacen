@extends('template')

@section('contenido')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <span class="fa fa-tag"></span> Categorías
                    <small>Subtitle</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Breadcrumb & Actions -->
        <div class="row">
            <div class="col-md-10">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="index.html">Inicio</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-tag"></i> Categorías
                    </li>
                </ol>
            </div>
            <div class="col-md-2">
                <a href="/categorias/crear" class="btn btn-block btn-primary">
                    <span class="fa fa-plus"></span> Nueva categoría
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="fa fa-bars"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="/categorias/editar/{{$categoria->id}}"><i class="fa fa-pencil-square-o"></i> Editar</a></li>
                                        <li><a href="/categorias/eliminar/{{$categoria->id}}"><i class="fa fa-trash-o"></i> Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

@endsection