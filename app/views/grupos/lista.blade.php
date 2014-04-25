@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de grupos
@stop
 
@section('content')

 <link rel="stylesheet" href="{{ url('css/bootstrap-2.3.1.css')}}">
 <link rel="stylesheet" href="{{ url('css/bootstrap-responsive-2.3.1.min.css')}}">

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