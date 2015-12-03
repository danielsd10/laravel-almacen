@extends('template')

@section('contenido')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <span class="fa fa-cube"></span> Productos
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
                        <i class="fa fa-cube"></i> Productos
                    </li>
                </ol>
            </div>
            <div class="col-md-2">
                <a href="/productos/crear" class="btn btn-block btn-primary">
                    <span class="fa fa-plus"></span> Nuevo producto
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
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Fecha de registro</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="fa fa-bars"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="/productos/editar/{{$producto->id}}"><i class="fa fa-pencil-square-o"></i> Editar</a></li>
                                        <li><a href="/productos/eliminar/{{$producto->id}}"><i class="fa fa-trash-o"></i> Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->categoria->nombre}}</td>
                            <td class="text-right">{{$producto->precio}}</td>
                            <td class="text-center">{{$producto->created_at}}</td>
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