<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
</head>
<body>
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
                <h2 class="mt-4">Login</h2>
                <form method="post" action="loginProcess.php">
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre de usuario:</label>
                        <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" class="form-control" required>
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