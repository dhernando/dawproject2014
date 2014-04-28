@extends('layouts.master')
 
@section('title') Usuarios @stop
 
@section('content')
 
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> Administración de usuarios <a href="/dawproject2014/public/admin/logout" class="btn btn-default pull-right">Logout</a></h1>
 
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Usuarios</a></li>
      <li><a href="/dawproject2014/public/admin/grupo">Grupos</a></li>
    </ul>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->getFullName() }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        <a href="/dawproject2014/public/admin/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                        {{ Form::open(['url' => '/admin/user/' . $user->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Borrar', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/dawproject2014/public/admin/user/create" class="btn btn-success">Agregar usuario</a>
 
</div>
 
@stop