@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de grupos
@stop
 
@section('content')

<h1>Grupos</h1>
 
 
<ul>
  @foreach($grupos as $grupo)
  <!-- Equivalente en Blade a <?php //foreach ($usuarios as $usuario) ?> -->
    <li>
      {{ HTML::link('grupos/'.$grupo->id , $grupo->nombre.' - '.$grupo->descripcion) }} 
    </li>
    <!-- Equivalente en Blade a <?php //echo $usuario->nombre.' '.$usuario->apellido ?> -->
  @endforeach 
</ul>
@stop