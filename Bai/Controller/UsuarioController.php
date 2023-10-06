<?php
    //namespace App\Controllers;
    //use App\Model\usuario;
    require "../Model/Usuario.php";
    class UsuarioController
    {
        private $usuario;

        function __construct()
        {
            $this->usuario = new Usuario;
        }

        // ESTO ERA PARA QUE AINHIZE ESTUVIERA FELIZ 
        // function visualizar(){
        //     $consultaSQL = "SELECT * FROM usuarios";
        //     $resultado = $this->conexion->query($sql);
        // }
        function save($data){
            // $nombre = $_REQUEST['nombre'];
            // $apellido = $_REQUEST['apellido'];
            // $email = $_REQUEST['email'];
            // $edad = $_REQUEST['edad'];
            // $data = "'".$nombre."','".$apellido."','".$email."','".$edad."'";
            $usu = new Usuario();
            $usu->crearUsuario($data);
            //header("location: crearAlumno.php");
         }
        
    }
?>