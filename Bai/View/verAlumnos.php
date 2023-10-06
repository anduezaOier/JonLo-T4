<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php
require_once "../Controller/AlumnoController.php";

function escapar($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

//$alumnoController = new AlumnoController();
//$alumnoController->mostrar();



?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crearAlumno.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="apellido" name="apellido" placeholder="Buscar por apellido" class="form-control">
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
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($alumnos as $alumno): ?>
          <tr>
            <td><?php echo escapar($alumno['id']) ?></td>
            <td><?php echo escapar($alumno['id'])?></td>
            <td><?php echo escapar($alumno['id'])?></td>
            <td><?php echo escapar($alumno['id'])?></td>
            <td><?php echo escapar($alumno['id'])?></td>
            <td>
              <a href="<?= 'borrar.php?id=' . escapar($fila["id"]) ?>">🗑️Borrar</a>
              <a href="<?= 'editar.php?id=' . escapar($fila["id"]) ?>">✏️Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <tbody>
      </table>
    </div>
  </div>
</div>
</html>