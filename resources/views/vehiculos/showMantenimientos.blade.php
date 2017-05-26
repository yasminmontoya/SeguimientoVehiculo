@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h1>Lista de Mantenimientos</h1>
                    <p class="lead">Esta es la lista de los mantenimientos asignados al vehiculo</p>
                    <h3>{{$vehiculo->placa}} ({{$vehiculo->marca}})</h3>
                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Estado</strong></td>
                    </tr>
                    @foreach($mantenimientos as $mantenimiento)
                    @if($mantenimiento->vehiculo_id == $vehiculo->id)
                    @foreach($fases as $fase)
                    @if($mantenimiento->fase_id == $fase->id)
                    @if($mantenimiento->estado == 'terminado')
                    <tr class="table-success">
                      <td>{{ $fase->nombre }}</td>
                      <td>{{ $mantenimiento->estado }}</td>
                    </tr>
                        @endif
                        @if($mantenimiento->estado == 'en curso')
                        <tr  class="table-info">
                      <td>{{ $fase->nombre }}</td>
                      <td>{{ $mantenimiento->estado }}</td>
                    </tr>
                        @endif
                        @if($mantenimiento->estado == 'sin realizar')
                        <tr  class="table-warning">
                      <td>{{ $fase->nombre }}</td>
                      <td>{{ $mantenimiento->estado }}</td>
                    </tr>
                        @endif

                    @endif
                    @endforeach
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
