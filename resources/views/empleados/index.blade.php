@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Lista de empleados</h1>
                    <p class="lead">Esta es la lista de sus empleados</p>
                    <h3><a href="/empleados/create">¿Añadir uno nuevo?</a></h3>
                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Apellidos</strong></td>
                      <td><strong>Acción</strong></td>
                    </tr>
                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->name }} </td>
                        <td>{{ ($empleado->apellidos) }}</td>
                      <td>
                       {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['empleados.destroy', $empleado->id]
                        ]) !!}
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                        @endforeach
                    </table>
                    <hr>
                    <a href="{{ route('admin.area') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
