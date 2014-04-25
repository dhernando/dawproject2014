@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información de grupo
@stop
 
@section('content')
        {{ HTML::link('grupos', 'Volver'); }}
        <h1>
  Grupo {{$grupo->id}}
      
</h1>
        
        {{ $grupo->nombre .' - '.$grupo->descripcion }}
        
<br />
        {{ $grupo->created_at}}
@stop