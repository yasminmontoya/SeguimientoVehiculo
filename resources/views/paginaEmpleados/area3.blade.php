@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                      {!! Form::open(['route' => 'mantenimientos.store', 'method' => 'POST'])!!}

                    <table class="table">
                    <tr>
                      <td><strong>Nombre</strong></td>
                      <td><strong>Estado</strong></td>
                    </tr>
                    @foreach($fases as $fase)
                    @foreach ($datos as $dato)
                    @if ($fase->id == $dato)

                    <input type="hidden" name="fase_id" value="{{ $fase->id }}">
                    <input type="hidden" name="fase_nombre" value="{{ $fase->nombre }}">
                    <tr>
                      <td>{{ $fase->nombre }}</td>
                      <td>
                       <div class="dropdown" >
                           <select class="form-control" name="fase_estado">
                                <option value="sin realizar">Sin realizar</option>
                                <option value="en curso">En curso</option>
                                <option value="terminado">Terminado</option>
                           </select>
                        </div>
                      </td>
                    </tr>
                        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">

                        @endif
                        @endforeach
                        @endforeach
                    </table>

                    <a href="{{ route('empleado.area2', $vehiculo->id) }}" class="btn btn-info">Volver</a>

                    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
