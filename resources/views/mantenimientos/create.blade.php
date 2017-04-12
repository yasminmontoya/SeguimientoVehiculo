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

                        <div class="form-group">
                            <select class="form-control" id="servicio_id" name="servicio_id">
                                <option value="">Seleccione el área</option>
                                @foreach($servicios as $servicio)
                                <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="fase_id" name="fase_nombre">
                                <option value="">Seleccione el área primero</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#servicio_id').on('change',function(){
        console.log($(this).val());
        $.get("{{ url('dropdown')}}",{ option: $(this).val() },function(data) {
            $('#fase_id').empty();
            $.each(data, function(index, faseObj) {
                $('#fase_id').append("<option value='" + faseObj.nombre + "'>" + faseObj.nombre + "</option>");
            });
        });
    });
});
</script>
@stop

