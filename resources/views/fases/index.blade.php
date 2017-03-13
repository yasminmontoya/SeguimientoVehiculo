@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{$servicio->nombre}}</h1>
                    <p class="lead">Esta es la lista de las fases creadas del  servicio </p>
                    <h3><a href="{{ route('fases.create', $servicio->id ) }}">¿Añadir un nueva fase?</a></h3>

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($fases as $fase)

                    @if ($fase->servicio_id == $servicio->id)
                    <tr>
                      <td>{{ $fase->nombre }}</td>
                      <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['fases.destroy', $fase->id]])!!}
                        <a href="{{ route('fases.edit', $fase->id) }}" class="btn btn-primary">Editar </a>
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}

                      </td>
                    </tr>
                        @endif
                        @endforeach
                    </table>
                    <a href="{{ route('servicios.index') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
