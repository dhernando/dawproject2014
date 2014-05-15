@extends('layouts.master')
 
@section('title') Editar Usuario @stop
 
@section('content')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='fa fa-user'></i> Editar Usuario</h1>
 
    {{ Form::model($user, ['role' => 'form', 'url' => '/admin/user/' . $user->id, 'method' => 'PUT']) }}
 
    <div class='form-group'>
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('apellido', 'Apellido') }}
        {{ Form::text('apellido', null, ['placeholder' => 'Apellido', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('image', 'Imagen') }}
        {{ Form::file('image')}}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::submit('Editar', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop