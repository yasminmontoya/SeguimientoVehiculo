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
                    <hr>
                    @foreach($vehiculos as $vehiculo)
                    @can('ver-vehiculos', $vehiculo)
                    <h3>{{ $vehiculo->placa }} ({{ ($vehiculo->marca) }})</h3>
                    <p>
                        <a href="{{ route('vehiculos.show', $vehiculo->id) }}" class="btn btn-info">Ver vehículo</a>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-primary">Editar vehículo</a>
                        <a href="{{ route('mantenimientos.show', $vehiculo->id) }}" class="btn btn-primary">Ver procesos</a>
                    </p>
                    <hr>
                    @endcan
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
