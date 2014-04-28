@extends('layouts.master')
 
@section('title') Grupos @stop
 
@section('content')
 
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="glyphicon glyphicon-music"></i> Administración de grupos <a href="/dawproject2014/public/admin/logout" class="btn btn-default pull-right">Logout</a></h1>
 
    <ul class="nav nav-tabs">
      <li><a href="/dawproject2014/public/admin/user">Usuarios</a></li>
      <li class="active"><a href="#">Grupos</a></li>
    </ul>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->nombre }}</td>
                    <td>{{ $grupo->descripcion }}</td>
                    <td>{{ $grupo->imagen }}</td>
                    <td>{{ $grupo->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        <a href="/dawproject2014/public/admin/grupo/{{ $grupo->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                        {{ Form::open(['url' => '/admin/grupo/' . $grupo->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Borrar', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/dawproject2014/public/admin/grupo/create" class="btn btn-success">Agregar grupo</a>
 
</div>
 
@stop