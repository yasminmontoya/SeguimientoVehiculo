@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h1>Editar Mantenimiento </h1>
                    <hr>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    {!! Form::model($mantenimiento, [
                        'method' => 'PUT',
                        'route' => ['mantenimientos.update', $mantenimiento->id]
                    ]) !!}

                    <input type="hidden" name="fase_id" value="{{ $mantenimiento->fase_id }}">
                    @foreach($fases as $fase)
                    @if($mantenimiento->fase_id == $fase->id)
                    <div class="form-group">
                        <h3>Servicio</h3>
                        <label>{{$fase->nombre}}</label>
                    </div>
                    @endif
                    @endforeach

                    <div class="dropdown" >
                           <select class="selectpicker" name="estado">
                                <option value="sin realizar">sin realizar</option>
                                <option value="en curso">en curso</option>
                                <option value="terminado">terminado</option>
                           </select>
                    </div>

                    <input type="hidden" name="vehiculo_id" value="{{ $mantenimiento->vehiculo_id }}">

                    <br><br>

                    <a href="{{ route('mantenimientos.index', $mantenimiento->vehiculo_id) }}" class="btn btn-info">Volver</a>

                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop
