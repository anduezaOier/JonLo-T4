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
require_once "../Controller/UsuarioController.php";

  function escapar($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
  }

  //$alumnoController = new AlumnoController();
  //$alumnoController->mostrar();
  $usuarioController = new UsuarioController();
  $error = false;
  $config = include '../config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    if (isset($_POST['nombreUsuario'])) {
      $consultaSQL = "SELECT * FROM usuarios WHERE nombreUsuario LIKE '%" . $_POST['nombreUsuario'] . "%'";
    } else {
      $consultaSQL = "SELECT * FROM usuarios WHERE tipo LIKE 'Alumno'";
    }
    $consultaSQL2 = "SELECT * FROM cursos";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();
    $sentencia2 = $conexion->prepare($consultaSQL2);
    $sentencia2->execute();

    $usuarios = $sentencia->fetchAll();
    $cursos = $sentencia2->fetchAll();

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
      $usuario = $_GET['id'];
      $usuarioController->delete($usuario);
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
      <?php if ($loggedIn && $type === 'Administrador') : ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="verAlumnos.php">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="verUsuarios.php">Usuario</a>
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
      <?php elseif ($loggedIn && $type === 'Alumno') : ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="verCursos.php">Cursos</a>
                </li>
            </ul>
            <!-- Right-side Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
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
            </ul>
      <?php endif; ?>
  </div>
</nav>
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
          <?php foreach($usuarios as $usuario): ?>
            <tr>
              <td><?php echo escapar($usuario['id']) ?></td>
              <td><?php echo escapar($usuario['nombreUsuario']) ?></td>
              <?php foreach($cursos as $curso):?>
                <?php if ($curso['id'] == $usuario['curso']) { 
                    $cursoa = ($curso['nombre']);
                    break;                 
                  }
                  ?>
                
              <?php endforeach;?>     
              <td><?php echo $cursoa; ?></td>     
              <td>
                <a href="verUsuarios.php?action=delete&id=<?= escapar($usuario["id"]) ?>">🗑️Borrar</a>              
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
</html>
