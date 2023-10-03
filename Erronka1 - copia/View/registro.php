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
  <?php
    include '../funciones.php';

    csrf();
    if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
      die();
    }

    if (isset($_POST['submit'])) {
      $resultado = [
        'error' => false,
        'mensaje' => 'El alumno ' . escapar($_POST['nombre']) . ' ha sido agregado con éxito'
      ];

      $config = include '../config.php';

      try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        $usuario = [
          "nombreUsuario"   => $_POST['nombreUsuario'],
          "contrasena"    => $_POST['contrasena'],
          "tipo" => "alumno",
        ];
        //$nombre = $_POST["nombre"];
        // $tipo = "alumno";
        // $password = $_POST["password"];
        //$consultaSQL = "INSERT INTO usuarios ($nombreUsuario, $password, $tipo)";
        $consultaAlumno = "SELECT nombre FROM alumnos";
        $sentenciaAlumno = $conexion->prepare($consultaAlumno);
        $sentenciaAlumno->execute();
        $alumnos = $sentenciaAlumno->fetchAll();
    
        $consultaSQL = "INSERT INTO usuarios (nombreUsuario, contrasena, tipo)";
        $consultaSQL .= "values (:" . implode(", :", array_keys($usuario)) . ")";

        $sentencia = $conexion->prepare($consultaSQL);
        $sentencia->execute($usuario);

      } catch(PDOException $error) {
        $resultado['error'] = true;
        $resultado['mensaje'] = $error->getMessage();
      }
    }
?>
</head>
<body>

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
      <h2 class="mt-4">Registro</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre de usuario</label>
          <input type="text" name="nombreUsuario" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="password1">Contraseña</label>
          <input type="password" name="contrasena" id="password1" class="form-control" require>
        </div>
        <div class="form-group">
          <label for="password2">Repite Contraseña</label>
          <input type="password" name="contrasena" id="password2" class="form-control" require>
        </div>
        <div class="form-group">
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar" onclick="check()">
          <a class="btn btn-primary" href="../index.php">Volver a la pagina principal</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>