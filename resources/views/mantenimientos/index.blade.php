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
                    <h3><a href="{{ route('mantenimientos.create', $vehiculo->id) }}">¿Añadir un nuevo mantenimiento?</a></h3>

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Estado</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($mantenimientos as $mantenimiento)
                    @if($mantenimiento->vehiculo_id == $vehiculo->id)
                    @foreach($fases as $fase)
                    @if($mantenimiento->fase_id == $fase->id)
                    <tr>
                      <td>{{ $fase->nombre }}</td>
                      <td>{{ $mantenimiento->estado }}</td>
                      <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['mantenimientos.destroy', $mantenimiento->id]]) !!}
                          <a href="{{ route('mantenimientos.edit', $mantenimiento->id ) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar </a>
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    </table>

                    <a href="{{ route('empleado.area') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
