@extends('layouts.master')
 
@section('sidebar')
     @parent
     Formulario de grupo
@stop
 
@section('content')
        {{ HTML::link('grupos', 'volver'); }}
        <h1>
  Crear Grupo
      
    
  
</h1>
        {{ Form::open(array('url' => 'grupos/crear')) }}
            {{Form::label('nombre', 'Nombre')}}
            {{Form::text('nombre', '')}}
            {{Form::label('descripcion', 'Descripcion')}}
            {{Form::text('descripcion', '')}}
            {{Form::submit('Guardar')}}
        {{ Form::close() }}
@stop