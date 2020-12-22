<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Demonios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vistas.css">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light navbar-view">
        <a class="navbar-brand" href="/">Dororo</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#fnavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="fnavbar">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="/articulos">Articulos</a></li>
          <li class="nav-item"><a class="nav-link" href="/demonios">Demonios</a></li>
          <li class="nav-item"><a class="nav-link" href="/lugares">Lugares</a></li>
          <li class="nav-item"><a class="nav-link" href="/partesdelcuerpo">Partes del cuerpo</a></li>
          <li class="nav-item"><a class="nav-link" href="/peleas">Peleas</a></li>
          </ul>
        </div>
    </nav>
    <div class="content shadow p-3 mb-5 bg-white rounded">
      <div class="container">
        <h1 class="text-center">Demonios</h1>
        <div id="app">
        @include('flash-message')
        @yield('content')
    </div>
    <button type="button" class="btn btn-primary btna" data-toggle="modal" data-target="#exampleModal">
Añadir Demonio
</button>
        <div class="row">

      <?php
      foreach ($demonio as $demonios):?>
                <div class=" col-md-4">
             <div class="card " style="width: 22rem;">
               <img class="card-img-top img" src="imagenDem/{{$demonios->imagen_dem}}" alt="">
    <div class="card-body tm" style=";">
      <h5 class="card-title">{{$demonios->nombre_dem}}</h5>
      <p class="" >{{$demonios->descrip_dem}}</p>
      <a href="/demonios/{{$demonios->slug}}" class="btn btn-primary">Ver más...</a>
    </div>
  </div>
  </div>
      <?php endforeach; ?>
      </div>
    </div>
    <!-- Crear -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Demonio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="/demonios" enctype="multipart/form-data">
                @csrf
              <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descripción</label>
          <input type="text" class="form-control" id="descrip" name="descrip" aria-describedby="emailHelp" placeholder="Descripción">
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Lugar</label>
        <select class="form-control" id="lugar" name="lugar">
          <?php foreach ($lugar as $lugares): ?>
          <option>{{$lugares->nombre_lug}}</option>
          <?php
         endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Parte de cuerpo</label>
        <input type="text" class="form-control" id="pcu" name="pcu" aria-describedby="emailHelp" placeholder="Parte del Cuerpo">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Imagen</label>
        <input type="file" id="imagen" name="imagen" >
      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://localhost:35729/livereload.js"></script>
  </body>
</html>
