@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h1>Lista de vehiculos</h1>
                    <p class="lead">Esta es la lista de los vehiculos</p>
                    <hr>


                    @foreach($vehiculos as $vehiculo)

                    <h3>{{ $vehiculo->placa }} ({{ ($vehiculo->marca) }})</h3>
                    <p>
                        <a href="{{ route( 'mantenimientos.index' , $vehiculo->id) }}" class="btn btn-primary">Ver Mantenimientos</a>
                    </p>
                    <hr>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
