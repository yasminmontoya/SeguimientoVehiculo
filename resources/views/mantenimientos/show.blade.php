@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h1>Lista de Mantenimientos</h1>
                    <p class="lead">Esta es la lista de los mantenimientos asignados al vehiculo</p>

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Estado</strong></td>
                    </tr>
                    @foreach($mantenimientos as $mantenimiento)
                    @if($mantenimiento->vehiculo_id == $vehiculo->id)
                    <tr>
                      <td>{{ $mantenimiento->fase_nombre }}</td>
                      <td>{{ $mantenimiento->fase_estado }}</td>
                    </tr>
                    @endif
                    @endforeach
                    </table>

                    <a href="{{ route('vehiculos.index') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
