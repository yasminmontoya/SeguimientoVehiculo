@extends('layouts.master')

@section('content')

<h1>Editar Fase </h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::model($fase, [
    'method' => 'PUT',
    'route' => ['fases.update', $fase->id]
]) !!}

<div class="form-group">
    {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('servicio_id', 'Tipo de Servicio:', ['class' => 'control-label']) !!}    
    <select class="form-control" name= "servicio_id">
        @foreach($servicios as $servicio)
            <option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
        @endforeach
    </select>
</div>
<br><br>
    
{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop