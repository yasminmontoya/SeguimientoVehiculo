@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Añadir Mantenimiento</h1>
                        <p class="lead">Crear un nuevo mantenimiento</p>
                        <hr>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        {!! Form::open(['route' => 'mantenimientos.store']) !!}

                        <div class="dropdown" >
                           <select class="form-control" name="fase_nombre">
                               @foreach($fases as $fase)
                                <option value="{{$fase->nombre}}">{{$fase->nombre}}
                               </option>
                                @endforeach
                           </select>
                        </div>

                        <input type="hidden" name="fase_estado" value="sin realizar">

                        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id}}">

                        <br>
                        <a href="{{ route('mantenimientos.index', $vehiculo->id) }}" class="btn btn-info">Volver</a>

                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
