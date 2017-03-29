@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h1>Lista de áreas</h1>
                    <p class="lead">Esta es la lista de los área creadas</p>
                    <h3><a href="/servicios/create">¿Añadir una nueva  área?</a></h3>
                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($servicios as $servicio)
                    <tr>
                      <td>{{ $servicio->nombre }}</td>

                      <td>
                          {!! Form::open(['method' => 'DELETE','route' => ['servicios.destroy', $servicio->id]])!!}
                          <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar </a>
                          <a href="{{ route('fases.index', $servicio->id ) }}" class="btn btn-warning">Ver Servicios </a>
                          {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                        @endforeach
                    </table>

                    <a href="{{ route('admin.area') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
