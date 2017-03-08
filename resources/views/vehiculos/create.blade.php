@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h1>Añadir Vehículo</h1>
                        <p class="lead">Realize el registro de su vehículo</p>
                        <hr>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        {!! Form::open(['route' => 'vehiculos.store']) !!}

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 

                        <div class="form-group">
                            {!! Form::label('placa', 'Placa', ['class' => 'control-label']) !!}
                            {!! Form::text('placa', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('marca', 'Marca', ['class' => 'control-label']) !!}
                            {!! Form::text('marca', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('linea', 'Linea', ['class' => 'control-label']) !!}
                            {!! Form::text('linea', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('modelo', 'Modelo', ['class' => 'control-label']) !!}
                            {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop