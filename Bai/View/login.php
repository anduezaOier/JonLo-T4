<!DOCTYPE html>
<?php
  session_start(); // Ensure session is started
  $config = include '../config.php';
  $loggedIn = isset($_SESSION['user_id']);
    if (isset($_SESSION['user_id'])) {
        header("Location: dashboard.php");
        exit;
    }
    
    // Check login credentials on form submission.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['usuario'];
        $password = $_POST['pasahitza'];
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        $query = "SELECT id, nombreUsuario, contrasena, tipo FROM usuarios WHERE nombreUsuario = '$username'";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Validate username and password (you should use a secure hashing method for password storage).
        if ($username === $user['nombreUsuario'] && $password === $user['contrasena']) {
            $_SESSION['user_id'] = $user['id']; // Store user ID or relevant user data in the session.
            $_SESSION['user_type'] = $user['tipo'];
            if($user['tipo'] == 'Alumno'){
                header("Location: verCursos.php");
            }else{
                header("Location: verAlumnos.php");
            }           
            exit;
        } else {
            $error = "Invalid username or password";
        }
    }
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
</head>
<body>
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
                <h2 class="mt-4">Login</h2>
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="usuario">Nombre de usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pasahitza">Contraseña:</label>
                        <input type="password" id="pasahitza" name="pasahitza" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                        <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>