@extends('layouts.master')

@section('content')

<h1>{{ $fase->nombre }}</h1>

<table class="table table-striped table-hover">
  <tr>
    <td style="width: 200px;">Id</td>
    <td>{{ $fase->id }}</td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td>{{ $fase->nombre }}</td>
  </tr>
<tr>
  <td>Tipo de Servicio</td>
  <td>{{ $fase->servicio_id }}</td>
</tr>
</table>
<hr>

<a href="{{ route('fases.index') }}" class="btn btn-info">Volver</a>
<a href="{{ route('fases.edit', $fase->id) }}" class="btn btn-primary">Editar</a>
<br>
<br>

{!! Form::open([
    'method' => 'DELETE',
    'route' => ['fases.destroy', $fase->id]
]) !!}
    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@stop