<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Demonio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/vistas.css">
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
      <div id="app">
      @include('flash-message')
      @yield('content')
  </div>
    <div class="text-center">
             <img class="card-img-top showd" src="/imagenDem/{{$demonio->imagen_dem}}" alt="">
        <h1 class="card-title">{{$demonio->nombre_dem}}</h1>
        <p class="card-text">{{$demonio->descrip_dem}}</p>
        <h4 class="card-title">Lugar</h4>
        <p class="card-text">{{$demonio->nombre_lug}}</p>
        <h4 class="card-title">Parte del Cuerpo</h4>
        <p class="card-text">{{$demonio->nombre_pcu}}</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Editar
    </button>
    <form class="" action="/demonios/{{$demonio->slug}}" method="POST">
      @method('DELETE')
      @csrf
         <input type="submit" name="" value="Eliminar" class="btn btn-danger">
    </form>
      </div>
      </div>
      <!-- Editar -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Demonio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="/demonios/{{$demonio->slug}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre_dem" aria-describedby="emailHelp" placeholder="Nombre" value="{{$demonio->nombre_dem}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Descripción</label>
            <input type="text" class="form-control" id="descrip" name="descrip_dem" aria-describedby="emailHelp" placeholder="Descripción" value="{{$demonio->descrip_dem}}">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect1">Lugar</label>
          <select class="form-control" id="lugar" name="nombre_lug">
            <?php foreach ($lugar as $lugares): ?>
            <option <?php if($demonio->nombre_lug==$lugares->nombre_lug) echo "selected";?>>{{$lugares->nombre_lug}}</option>
            <?php
           endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Parte de cuerpo</label>
          <input type="text" class="form-control" id="pcu" name="nombre_pcu" aria-describedby="emailHelp" placeholder="Parte del Cuerpo" value="{{$demonio->nombre_pcu}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Imagen</label>
          <input type="file" id="imagen" name="imagen_dem" >
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
