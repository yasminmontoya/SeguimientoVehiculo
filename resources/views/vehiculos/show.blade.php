@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $vehiculo->placa }}</h1>
                    <table class="table table-striped table-hover">
                      <tr>
                        <td style="width: 200px;">Id</td>
                        <td>{{ $vehiculo->id }}</td>
                      </tr>
                      <tr>
                        <td>Placa</td>
                        <td>{{ $vehiculo->placa }}</td>
                      </tr>
                    <tr>
                      <td>Marca</td>
                      <td>{{ $vehiculo->marca }}</td>
                    </tr>
                    <tr>
                      <td>Linea</td>
                      <td>{{ $vehiculo->linea }}</td>
                    </tr>
                    <tr>
                      <td>Modelo</td>
                      <td>{{ $vehiculo->modelo }}</td>
                    </tr>
                    </table>

                    <hr>

                    <a href="{{ route('vehiculos.index') }}" class="btn btn-info">Volver</a>
                    <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-primary">Editar</a>
                    <br>
                    <br>

                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['vehiculos.destroy', $vehiculo->id]
                    ]) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                
                </div>
            </div>
        </div>
    </div>
</div>


@stop