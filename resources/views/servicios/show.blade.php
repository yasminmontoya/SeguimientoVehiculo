@extends('layouts.master')

@section('content')

<h1>{{ $servicio->placa }}</h1>

<table class="table table-striped table-hover">
  <tr>
    <td style="width: 200px;">Id</td>
    <td>{{ $servicio->id }}</td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td>{{ $servicio->nombre }}</td>
  </tr>
<tr>
</table>

<hr>

<a href="{{ route('servicios.index') }}" class="btn btn-info">Volver</a>
<a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar</a>
<br>
<br>

{!! Form::open([
    'method' => 'DELETE',
    'route' => ['servicios.destroy', $servicio->id]
]) !!}
    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@stop