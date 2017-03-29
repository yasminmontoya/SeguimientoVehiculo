@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $empleado->nombre }}</h1>
                    <table class="table table-striped table-hover">
                      <tr>
                        <td style="width: 200px;">Id</td>
                        <td>{{ $empleado->id }}</td>
                      </tr>
                      <tr>
                        <td>Nombre</td>
                        <td>{{ $empleado->name }}</td>
                      </tr>
                    <tr>
                      <td>Apellidos</td>
                      <td>{{ $empleado->apellidos }}</td>
                    </tr>
                    <tr>
                      <td>Telefono</td>
                      <td>{{ $empleado->telefono }}</td>
                    </tr>
                    <tr>
                      <td>Correo</td>
                      <td>{{ $empleado->email }}</td>
                    </tr>
                    </table>

                    <hr>
                     {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['empleados.destroy', $empleado->id]
                    ]) !!}
                    <a href="{{ route('empleados.index') }}" class="btn btn-info">Volver</a>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>


@stop
