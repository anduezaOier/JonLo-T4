<html>
<?php
  session_start(); // Ensure session is started
  $loggedIn = isset($_SESSION['user_id']);
?>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <script>
      function check() {
        var password1 = document.getElementById('password1').value;
        var password2 = document.getElementById('password2').value;
        if (password1 == password2) {
        } else {
            alert("Las contraseñas deben de ser iguales.") 
        }
      } 
  </script>
</head>
<body>

<?php
require_once "../Controller/UsuarioController.php";
include '../funciones.php';

$usuarioController = new UsuarioController();
$filtercolumn = "";
$filtervalue = "";

if (isset($_POST['submit'])) {
  $config = include '../config.php';
  if($_POST['contrasena'] == $_POST['contrasena2']){
    $resultado = [
      'error' => false,
      'mensaje' => 'El usuario ' . escapar($_POST['nombreUsuario']) . ' ha sido agregado con éxito'
    ];
    $usuario = array(
      "dni"   => $_POST['dni'],
      "nombreUsuario"   => $_POST['nombreUsuario'],
      "contrasena" => $_POST['contrasena'],
      "tipo"    => "Alumno",
    );
    $usuarioController->save($usuario);
  }else{
    $resultado = [
      'error' => false,
      'mensaje' => 'La contraseña tiene que ser igual'
    ];
  }

  
}
?>
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <?php if ($loggedIn): ?>
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
      <h2 class="mt-4">Registro</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="dni">DNI:</label>
          <input type="text" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre de usuario:</label>
          <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control">
        </div>
        <div class="form-group">
          <label for="password1">Contraseña:</label>
          <input type="password" name="contrasena" id="password1" class="form-control" require>
        </div>
        <div class="form-group">
          <label for="password2">Repite Contraseña:</label>
          <input type="password" name="contrasena2" id="password2" class="form-control" require>
        </div>
        <div class="button-container">
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" onclick="check()">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>