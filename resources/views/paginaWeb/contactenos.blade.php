<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <title>Taller Mecánico</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" >Taller Mecánico</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
            <li ><a href="{{ route('pagina.inicio')}}"><dt>Inicio</dt></a></li>
            <li><a href="{{ route('pagina.servicio')}}">Nuestros Servicios</a></li>
            <li class="active"><a href="{{ route('pagina.contacto')}}">Contactenos</a></li>
          </ul>
            <div class="nav navbar-nav navbar-right">
            <li><a href="{{ route('admin.login')}}">Login Admin</a></li>
            <li><a href="{{ route('login')}}">Login</a></li>
            </div>
        </div>
      </div>
    </nav>
    <div class="container">



<h1>Contáctenos</h1>
<p class="lead"></p>
<hr>


<div class="form-group">
    {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('asunto', 'Asunto', ['class' => 'control-label']) !!}
    {!! Form::text('asunto', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('motivo', 'Mensaje', ['class' => 'control-label']) !!}
    {!! Form::textarea('motivo', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>