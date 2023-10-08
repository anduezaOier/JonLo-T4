<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
  </head>
<?php

include '../funciones.php';
require_once "../Controller/AlumnoController.php";
$alumnoController = new AlumnoController();
$filtercolumn = "";
$filtervalue = "";

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El alumno ' . escapar($_POST['nombre']) . ' ha sido agregado con éxito'
  ];

  $config = include '../config.php';

  $alumno = array(
    "dni"   => $_POST['dni'],
    "nombre"   => $_POST['nombre'],
    "apellido" => $_POST['apellido'],
    "email"    => $_POST['email'],
    "edad"     => $_POST['edad'],
  );

  $alumnoController->save($alumno);
}
?>
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Left-side Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="verAlumnos.php">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="verUsuarios.php">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="verCursos.php">Cursos</a>
                </li>
            </ul>

            <!-- Right-side Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
                </li>
            </ul>
        </div>
</nav>
<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un alumno</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>
</html>

