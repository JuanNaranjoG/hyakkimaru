<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peleas</title>
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
    <div class="content shadow p-3 mb-5 bg-white rounded md">
      <div class="container">
        <h1 class="text-center">Peleas</h1>
        <div id="app">
        @include('flash-message')
        @yield('content')
    </div>
        <div class="row">
          <button type="button" class="btn btn-primary btna " data-toggle="modal" data-target="#exampleModal">
      Añadir Pelea
      </button>
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="text-center">#</th>
      <th scope="col" class="text-center">Ganador</th>
      <th scope="col" class="text-center">Lugar</th>
      <th scope="col" class="text-center">Demonio</th>
      <th scope="col" class="text-center">Fecha</th>
      <th scope="col" class="text-center" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $j=1;
      foreach ($pelea as $peleas): ?>
           <th scope="row" class="text-center"><?php echo $j; ?></th>
           <td class="text-center">{{$peleas->ganador_pel}}</td>
           <td class="text-center">{{$peleas->nombre_lug}}</td>
           <td class="text-center">{{$peleas->nombre_dem}}</td>
           <td class="text-center">{{$peleas->fecha_pel}}</td>
           <td class="text-center tda"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#p{{$peleas->id}}">Editar</button></td>
           <td class="text-center tda"><form  action="/peleas/{{$peleas->ganador_pel}}" method="POST">
             @method('DELETE')
             @csrf
                <input type="submit" name="" value="Eliminar" class="btn btn-danger">
           </form>
           </td>
           </tr>
      <?php
      $j++;
     endforeach; ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
    <!-- Crear -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Pelea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="/peleas" enctype="multipart/form-data">
                @csrf
              <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Ganador</label>
          <input type="text" class="form-control" id="ganador" name="ganador" aria-describedby="emailHelp" placeholder="Ganador">
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
      <label for="exampleFormControlSelect1">Demonio</label>
      <select class="form-control" id="demonio" name="demonio">
        <?php foreach ($demonio as $demonios): ?>
        <option>{{$demonios->nombre_dem}}</option>
        <?php
       endforeach; ?>
      </select>
    </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp" placeholder="Fecha">
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
        <!-- Editar -->
        <?php foreach ($pelea as $peleas): ?>
            <div class="modal fade" id="p{{$peleas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Parte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="/peleas/{{$peleas->ganador_pel}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ganador</label>
                      <input type="text" class="form-control" id="ganador" name="ganador_pel" aria-describedby="emailHelp" placeholder="Ganador" value="{{$peleas->ganador_pel}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Lugar</label>
                    <select class="form-control" id="lugar" name="nombre_lug">
                      <?php foreach ($lugar as $lugares): ?>
                      <option <?php if($peleas->nombre_lug==$lugares->nombre_lug) echo "selected";?>>{{$lugares->nombre_lug}}</option>
                      <?php
                     endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleFormControlSelect1">Demonio</label>
                  <select class="form-control" id="demonio" name="nombre_dem">
                    <?php foreach ($demonio as $demonios): ?>
                      <option <?php if($peleas->nombre_dem==$demonios->nombre_dem) echo "selected";?>>{{$demonios->nombre_dem}}</option>
                    <?php
                   endforeach; ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha_pel" aria-describedby="emailHelp" placeholder="Fecha" value="{{$peleas->fecha_pel}}">
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
            <?php
           endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://localhost:35729/livereload.js"></script>
  </body>
</html>
