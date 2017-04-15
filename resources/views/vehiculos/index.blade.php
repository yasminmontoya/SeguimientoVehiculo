@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Lista de vehiculos</h1>
                    <p class="lead">Esta es la lista de sus vehiculos</p>
                    <h3><a href="/vehiculos/create">¿Añadir uno nuevo?</a></h3>

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($vehiculos as $vehiculo)
                    @can('ver-vehiculos', $vehiculo)
                    <tr>
                      <td>{{ $vehiculo->placa }} ({{ ($vehiculo->marca) }})</td>

                      <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['vehiculos.destroy', $vehiculo->id]]) !!}
                          <a href="{{ route('vehiculos.showMantenimientos', $vehiculo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open"></span>Ver procesos</a>
                          <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endcan
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
