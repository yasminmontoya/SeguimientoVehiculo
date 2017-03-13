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
                    <hr>
                    @foreach($empleados as $empleado)

                    <h3>{{ $empleado->name }} ({{ ($empleado->apellidos) }})</h3>
                    <p>
                        <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info">Ver empleado</a>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar empleado</a>
                    </p>
                    <hr>

                    @endforeach

                    <a href="{{ route('admin.area') }}" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
