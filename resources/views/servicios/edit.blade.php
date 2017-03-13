@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
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

                    <a href="{{ route('servicios.index') }}" class="btn btn-info">Volver</a>

                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@stop
