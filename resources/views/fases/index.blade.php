@extends('layouts.master')

@section('content')

<h1>Lista de fases</h1>
<p class="lead">Esta es la lista de las fases creadas</p>
<h3><a href="/fases/create">¿Añadir una nueva?</a></h3>
<hr>

@foreach($fases as $fase)

<h3>{{ $fase->nombre }}</h3>
<p>
    <a href="{{ route('fases.show', $fase->id) }}" class="btn btn-info">Ver fase</a>
    <a href="{{ route('fases.edit', $fase->id) }}" class="btn btn-primary">Editar fase</a>
</p>
<hr>

@endforeach

@stop