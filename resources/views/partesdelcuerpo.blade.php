<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Partes del Cuerpo</title>
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
        <h1 class="text-center">Partes del Cuerpo</h1>
        <div id="app">
        @include('flash-message')
        @yield('content')
    </div>
        <div class="row">
          <button type="button" class="btn btn-primary btna" data-toggle="modal" data-target="#exampleModal">
      Añadir Parte
      </button>
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="text-center">#</th>
      <th scope="col" class="text-center">Nombre</th>
      <th scope="col" class="text-center">Estado</th>
      <th scope="col" class="text-center" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $j=1;
      foreach ($partedelcuerpo as $partesdelcuerpo): ?>
           <th scope="row" class="text-center"><?php echo $j; ?></th>
           <td class="text-center">{{$partesdelcuerpo->nombre_pcu}}</td>
           <td class="text-center">{{$partesdelcuerpo->estado_pcu}}</td>
           <td class="text-center tda"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#pc{{$partesdelcuerpo->id}}">Editar</button></td>
           <td class="text-center tda"><form  action="/partesdelcuerpo/{{$partesdelcuerpo->nombre_pcu}}" method="POST">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Parte</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="/partesdelcuerpo" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Estado</label>
      <input type="text" class="form-control" id="estado" name="estado" aria-describedby="emailHelp" placeholder="Estado">
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
    <?php foreach ($partedelcuerpo as $partesdelcuerpo): ?>
        <div class="modal fade" id="pc{{$partesdelcuerpo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Parte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="/partesdelcuerpo/{{$partesdelcuerpo->nombre_pcu}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre_pcu" aria-describedby="emailHelp" placeholder="Nombre" value="{{$partesdelcuerpo->nombre_pcu}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Estado</label>
                  <input type="text" class="form-control" id="estado" name="estado_pcu" aria-describedby="emailHelp" placeholder="Estado" value="{{$partesdelcuerpo->estado_pcu}}">
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
