<?php
class UsuarioController
{
    require_once 'usuario.php';
    $conexionBD = new ConexionBD();
    $conexionBD->establecerConexion('localhost', 'root', '', 'erronka1');

    $modelo = new Usuario();
    $controlador = new UsuarioController();

    $modelo->establecerConexion($conexionBD->obtenerConexion());

    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }

    // ESTO ERA PARA QUE AINHIZE ESTUBIERA FELIZ 
    // function visualizar(){
    //     $consultaSQL = "SELECT * FROM usuarios";
    //     $resultado = $this->conexion->query($sql);
    // }

    function crear(){
        $nombre = $_POST["nombre"];
        $tipo = "alumno";
        $password = $_POST["password"];
        $consultaSQL = "INSERT INTO usuarios ($nombreUsuario, $password, $tipo)";
        $resultado = $this->conexion->query($sql);
    }

    function actualizar(){
        $nombre = $_POST["nombre"];
        $tipo = "alumno";
        $password = $_POST["password"];
        $consultaSQL = "UPDATE usuarios SET ($nombreUsuario, $password, $tipo) WHERE id =" $id;
        $resultado = $this->conexion->query($sql);
    }

    function borrar(){
        $consultaSQL = "DELETE FROM usuarios WHERE id =" $id;
        $resultado = $this->conexion->query($sql);
    }
}
    
?>