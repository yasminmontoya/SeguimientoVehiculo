@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in ADMIN!
                    <br><br>
                    <a href="{{ route('servicios.index') }}" class="btn btn-info">Areas </a>
                    <br><br>
                    <a href="{{ route('empleados.index') }}" class="btn btn-info">Empleados</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
