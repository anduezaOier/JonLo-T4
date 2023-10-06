<?php

    //use App\Http\Response;

    if (! function_exists('view')) {
        function view($view, $data){
            return new Response($view, $data);
        }
    }

    if (! function_exists('viewPath')) {
        function viewPath($view){
            return __DIR__ . "/Views/$view.php";
        }
    }

    if (! function_exists('checkAuthentication')) {
        function checkAuthentication($path){
            // Verifica si existen variables de sesión
            if (!isset($_SESSION['name']) && !isset($_SESSION['email'])){
                // $path representa la ruta al login dependiendo de donde es llamado esta función
                header("location: $path");
                exit;
            }
        }
    }
?>