<html>
<?php
  session_start(); // Ensure session is started
  $loggedIn = isset($_SESSION['user_id']);
  $type = ($_SESSION['user_type']);
  $name = ($_SESSION['user_name']);
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
  </head>
<?php
include '../funciones.php';
require_once "../Controller/UsuarioController.php";

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include '../config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['nombre'])) {
    $consultaSQL = "SELECT * FROM cursos WHERE nombre LIKE '%" . $_POST['nombre'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM cursos";
  }

  $usuarioController = new usuarioController();
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $cursos = $sentencia->fetchAll();

  if (isset($_GET['action']) && $_GET['action'] === 'matriculatu' && isset($_GET['id'])) {
    $user = array(
      "laid" => $_SESSION['user_id'],
    );
    $cursoId = $_GET['id'];
    $usuarioController->updateCurso($cursoId, $user);
  } else {
    
  }

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['nombre']) ? 'Lista de cursos (' . $_POST['nombre'] . ')' : 'Lista de cursos';
?>

<nav class="navbar navbar-expand-lg ">
        <div class="container">
            <!-- Left-side Links -->
            <?php if ($loggedIn && $type === 'Alumno'): ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="verCursos.php">Cursos</a>
                </li>
            </ul>
            <!-- Right-side Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <p style="color: white;">Bienvenido, <?php echo $name; ?></p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
            <?php else: ?>
            <!-- Right-side Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
            <?php endif; ?>        
        </div>
</nav>
<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
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
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="nombre" name="nombre" placeholder="Buscar por nombre de curso" class="form-control">
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
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Idioma</th>
            <th>Código</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($cursos as $curso) {
              ?>
              <tr>
                <td><?php echo escapar($curso["nombre"]); ?></td>
                <td><?php echo escapar($curso["descripcion"]); ?></td>
                <td><?php echo escapar($curso["idioma"]); ?></td>
                <td><?php echo escapar($curso["codigo"]); ?></td>
                <td><a href="<?= 'verCursos.php?action=matriculatu&id=' . escapar($curso["id"]) ?>" class="btn btn-primary">Matricularse</a></td>
              </tr>
              <?php   
            }        
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>
</html>