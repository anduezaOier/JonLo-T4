<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
  $resultado = [
    'error' => false,
    'mensaje' => 'El usuario ' . escapar($_POST['nombreUsuario']) . ' ha sido agregado con éxito'
  ];

  $config = include '../config.php';

  $usuario = array(
    "nombreUsuario"   => $_POST['nombreUsuario'],
    "contrasena" => $_POST['contrasena'],
    "tipo"    => "alumno",
  );

  $usuarioController->save($usuario);

}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Registro</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre de usuario</label>
          <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control">
        </div>
        <div class="form-group">
          <label for="password1">Contraseña</label>
          <input type="password" name="contrasena" id="password1" class="form-control" require>
        </div>
        <div class="form-group">
          <label for="password2">Repite Contraseña</label>
          <input type="password" name="contrasena2" id="password2" class="form-control" require>
        </div>
        <div class="button-container">
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>