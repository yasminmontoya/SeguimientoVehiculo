@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h1>Añadir Empleado</h1>
                        <hr>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        {!! Form::open(['route' => 'empleados.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']) !!}
                            {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telefono', 'Telefono', ['class' => 'control-label']) !!}
                            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <a href="{{ route('empleados.index') }}" class="btn btn-info">Volver</a>
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
