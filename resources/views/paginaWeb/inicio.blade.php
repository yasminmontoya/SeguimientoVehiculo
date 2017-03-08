<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <title>Taller Mecánico</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Taller Mecánico</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('pagina.inicio')}}"><dt>Inicio</dt></a></li>
            <li><a href="{{ route('pagina.servicio')}}">Nuestros Servicios</a></li>
            <li><a href="{{ route('pagina.contacto')}}">Contactenos</a></li>
          </ul>
            <div class="nav navbar-nav navbar-right">
            <li><a href="{{ route('admin.login')}}">Login Admin</a></li>
            <li><a href="{{ route('login')}}">Login</a></li>
            </div>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="jumbotron">            
            <p>Esta es la aplicación web presta el servicio de visualización en tiempo real de los procesos de revisión y reparación vehicular en un taller mecánico. La revisión vehicular es un proceso que nos permite saber si los vehículos en los que transitamos poseen las condiciones mecánicas óptimas para poder circular por las vías de nuestro país, también se prestan servicios de reparación y mantenimiento variado.</p><br>
            <img  class="espacio-imagen center-block" src="{{ asset('imagenes/imagen1.png') }}" alt="" width="539" height="381" >
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>