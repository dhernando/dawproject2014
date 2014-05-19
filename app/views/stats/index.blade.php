@extends('layouts.master')
 
@section('title') Stats @stop
 
@section('content')
 
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="glyphicon glyphicon-music"></i> Administración de grupos <a href="/dawproject2014/public/admin/logout" class="btn btn-default pull-right">Logout</a></h1>
 
    <ul class="nav nav-tabs">
      <li><a href="/dawproject2014/public/admin/user">Usuarios</a></li>
      <li><a href="/dawproject2014/public/admin/grupo">Grupos</a></li>
      <li class="active"><a href="#">Estadisticas</a></li>
    </ul>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Busquedas</th>
                    <th>Tiene perfil</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($datos as $dato)
                <tr class="stats">
                    <?php if ($dato->perfil == "no" and $dato->busquedas < 60 and $dato->busquedas > 30) { ?>
                    <td class="naranja">{{ $dato->grupo }}</td>
                    <td class="naranja">{{ $dato->busquedas }}</td>
                    <td class="naranja">{{ $dato->perfil }}</td>
                    <td>
                        <form action="http://localhost/dawproject2014/public/admin/estadisticas/eliminar/{{ $dato->id }}" method="post">
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <?php } else if ($dato->perfil == "no" and $dato->busquedas >= 60) {?>
                    <td class="rojo">{{ $dato->grupo }}</td>
                    <td class="rojo">{{ $dato->busquedas }}</td>
                    <td class="rojo">{{ $dato->perfil }}</td>
                    <td>
                        <form action="http://localhost/dawproject2014/public/admin/estadisticas/eliminar/{{ $dato->id }}" method="post">
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <?php } else { ?>
                    <td>{{ $dato->grupo }}</td>
                    <td>{{ $dato->busquedas }}</td>
                    <td>{{ $dato->perfil }}</td>
                    <td>
                        <form action="http://localhost/dawproject2014/public/admin/estadisticas/eliminar/{{ $dato->id }}" method="post">
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/dawproject2014/public/admin/grupo/create" class="btn btn-success">Agregar grupo</a>
 
</div>
 
@stop