@extends('layouts.master')

@section('content')

<h1>Lista de servicios</h1>
<p class="lead">Esta es la lista de los servicios disponibles</p>
<h3><a href="/servicios/create">¿Añadir uno nuevo?</a></h3>
<hr>

@foreach($servicios as $servicio)

<h3>{{ $servicio->nombre }}</h3>
<p>
    <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-info">Ver servicio</a>
    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar servicio</a>
</p>
<hr>

@endforeach

@stop