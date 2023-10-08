<html>
<?php
  session_start(); // Ensure session is started
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
  </head>

<?php
require_once "../Controller/AlumnoController.php";

  function escapar($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
  }

  //$alumnoController = new AlumnoController();
  //$alumnoController->mostrar();
  $alumnoController = new AlumnoController();
  $error = false;
  $config = include '../config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    if (isset($_POST['apellido'])) {
      $consultaSQL = "SELECT * FROM alumnos WHERE apellido LIKE '%" . $_POST['apellido'] . "%'";
    } else {
      $consultaSQL = "SELECT * FROM alumnos";
    }

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();

    $alumnos = $sentencia->fetchAll();

    if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
      $alumno = $_GET['id'];
      $alumnoController->delete($alumno);
    } else {
      
    }

  } catch(PDOException $error) {
    $error= $error->getMessage();
  }

  $titulo = isset($_POST['apellido']) ? 'Lista de alumnos (' . $_POST['apellido'] . ')' : 'Lista de alumnos';

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
            <th>DNI</th>
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
            <td><?php echo escapar($alumno['dni']) ?></td>
            <td><?php echo escapar($alumno['nombre'])?></td>
            <td><?php echo escapar($alumno['apellido'])?></td>
            <td><?php echo escapar($alumno['email'])?></td>
            <td><?php echo escapar($alumno['edad'])?></td>
            <td>
              <a href="verAlumnos.php?action=delete&id=<?= escapar($alumno["id"]) ?>">🗑️Borrar</a>              
              <a href="<?= 'editarAlumno.php?id=' . escapar($alumno["id"]) ?>">✏️Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <tbody>
      </table>
    </div>
  </div>
</div>
</html>