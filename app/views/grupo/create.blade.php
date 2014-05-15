@extends('layouts.master')
 
@section('title') Crear Grupo @stop
 
@section('content')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='glyphicon glyphicon-music'></i> Agregar Grupo</h1>
 
    {{ Form::open(['role' => 'form', 'url' => '/admin/grupo', 'files' => true]) }}
 
    <div class='form-group'>
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('descripcion', 'Descripcion') }}
        {{ Form::textarea('descripcion', null, ['placeholder' => 'Descripcion', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('image', 'Imagen') }}
        {{ Form::file('image')}}
    </div>
 
    <div class='form-group'>
        {{ Form::submit('Crear', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop