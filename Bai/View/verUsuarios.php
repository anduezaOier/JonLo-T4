<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="registro.php"  class="btn btn-primary mt-4">Crear usuario</a>
      <hr>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Buscar por usuario" class="form-control">
        </div>
        <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
        <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3"><?= $titulo ?></h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre de usuario</th>
            <th>Cursos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $usuario): ?>
              <tr>
                <td><? $data["id"] ?></td>
                <td><? $data["nombreUsuario"] ?></td>
                <td><? $data["asignatura"] ?></td>
                <!-- <td>
                  <a href="<?= 'borrar.php?id=' . escapar($fila["id"]) ?>">🗑️Borrar</a>
                  <a href="<?= 'editar.php?id=' . escapar($fila["id"]) ?>">✏️Editar</a>
                </td> -->
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <ul>
        <?php foreach($data as $usuario): ?>
            <li><?= $usuario["nombreUsuario"] ?> | <a href='./show/<?= $usuario["id"] ?>'>Detalle</a> | <a href='./edit/<?= $usuario["id"] ?>'>Editar</a> | <a href='./destroy/<?= $usuario["id"] ?>'>Eliminar</a> </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
</html>
