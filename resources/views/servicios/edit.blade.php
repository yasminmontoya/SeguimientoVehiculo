@extends('layouts.master')

@section('content')

<h1>Editar Servicio </h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::model($servicio, [
    'method' => 'PUT',
    'route' => ['servicios.update', $servicio->id]
]) !!}

<div class="form-group">
    {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<br><br>
    
{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop