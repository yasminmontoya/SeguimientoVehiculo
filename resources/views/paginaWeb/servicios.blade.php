<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <title>Taller Mecánico</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse ">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Taller Mecánico</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
            <li><a href="{{ route('pagina.inicio')}}"><dt>Inicio</dt></a></li>
            <li class="active"><a href="{{ route('pagina.servicio')}}">Nuestros Servicios</a></li>
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
            <h3>Revisión Técnico Mecánica</h3>
            <ul>
                <li>Inyección electrónica y mecánica</li>
                <li>Reparación y carga de aire acondicionado</li>
                <li>Tren delantero</li>
                <li>Frenos</li>
                <li>Carburación</li>
                <li>Caja de velocidades</li>
                <li>Embragues</li>
                <li>Suspensión, alineación y balanceo</li>
                <li>Puesta a punto de electrónica</li>
                <li>Rectificación de motores</li>
                <li>Limpieza y calibrado de inyectores</li>
            </ul>
            <br> 
            <img  class="espacio-imagen center-block" src="{{ asset('imagenes/imagen2.png') }}" alt="" width="452" height="301" >
             </div>
            <br>
          <div class="jumbotron"> 
            <h3>Chapa Y Pintura</h3>
            <ul>
                <li>Limpieza exterior del vehículo</li>
                <li>Reparación de chapa</li>
                <li>Pintura de automotor</li>
                <li>Toques de estacionamiento</li>
            </ul>
            <br>  
            <img  class="espacio-imagen center-block" src="{{ asset('imagenes/imagen3.png') }}" alt="" width="467" height="346" >
                </div>
            <br>
                <div class="jumbotron"> 
            <h3>Electricidad del automotor</h3>
            <ul>
                <li>Arranques</li>
                <li>Alternadores</li>
                <li>Encendido</li>
                <li>Electroventiladores</li>
                <li>Bujías</li>
                <li>Cables</li>
                <li>Revisión de temperatura</li>
                <li>Afinación completa</li>
            </ul>
            <br>
            <img  class="espacio-imagen center-block" src="{{ asset('imagenes/imagen4.png') }}" alt="" width="507" height="353" >           
        </div><br>
         <div class="jumbotron"> 
            <h3>Lubricación</h3>
            <ul>
                <li>Limpieza de tanque de aceite</li>
                <li>Limpieza de filtros</li>
                <li>Cambio de aceite y filtros</li>
            </ul>
            <br>
            <img  class="espacio-imagen center-block" src="{{ asset('imagenes/imagen5.png') }}" alt="" width="521" height="346" >           
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>