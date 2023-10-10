<?php
session_start();

// Database connection (replace with your own)
$db = new PDO('mysql:host=localhost;dbname=erronka1', 'root', '');

// Get user input
$nombreUsuario = $_POST['nombreUsuario'];
$contrasena = $_POST['contrasena'];

// Query the database to check the user's credentials
$query = "SELECT id, nombreUsuario, contrasena, tipo FROM usuarios WHERE nombreUsuario = :nombreUsuario";
$stmt = $db->prepare($query);
$stmt->bindParam(':nombreUsuario', $nombreUsuario);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($contrasena, $user['contrasena'])) {
    // Authentication successful
    if($user['tipo'] == 'Alumno'){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['nombreUsuario'];
        $_SESSION['tipo'] = $user['tipo'];
        header('Location: verCursos.php');
    }else{
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['nombreUsuario'];
        $_SESSION['tipo'] = $user['tipo'];
        header('Location: verAlumnos.php');
    }
     // Redirect to the dashboard or another authorized page
} else {
    // Authentication failed
    $_SESSION['login_error'] = 'Invalid username or password';
    header('Location: login.php'); // Redirect back to the login page with an error message
}
?>