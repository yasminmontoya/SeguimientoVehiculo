@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Lista de vehiculos</h1>
                    <p class="lead">Esta es la lista de los vehiculos en el taller</p>

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($vehiculos as $vehiculo)
                    <tr>
                      <td>{{ $vehiculo->placa }} ({{ ($vehiculo->marca) }})</td>
                      <td>
                          <a href="{{ route('mantenimientos.index', $vehiculo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open"></span> Ver mantenimientos</a>
                      </td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
