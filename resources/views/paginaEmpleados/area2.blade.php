@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">


                    {!! Form::open(array('route' => ['empleado.area3',$vehiculo->id])) !!}

                    @foreach ($servicios as $servicio)

                      <ul class="list-group">
                          <li class="list-group-item active">{{ $servicio->nombre }} </li>

                          @foreach ($fases as $fase)

                           @if($fase->servicio_id == $servicio->id)

                          <li class="list-group-item">
                          {!! Form::checkbox('fase[]', $fase->id) !!}
                          {!! Form::label('fase', $fase->nombre, ['class' => 'control-label']) !!}
                          </li>

                          @endif

                          @endforeach

                      </ul>
                    @endforeach

                    <a href="{{ route('empleado.area') }}" class="btn btn-info">Volver</a>


                    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
