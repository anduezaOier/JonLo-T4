<?php
use ../Model/usuario;
class UsuarioController
{
    private $usuario;

    function __construct()
    {
        $this->usuario = new Usuario;
        session_start();
    }

    // ESTO ERA PARA QUE AINHIZE ESTUBIERA FELIZ 
    // function visualizar(){
    //     $consultaSQL = "SELECT * FROM usuarios";
    //     $resultado = $this->conexion->query($sql);
    // }

    public function index(){
            // $min_query -> hace referencia a minimizar la consulta desde la URL, para no traer a todos los registros
            $min_query = explode('?q=',$_SERVER['REQUEST_URI']);
            $min_query = isset($min_query[1]) ? filter_var($min_query[1], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "";

            $results = $this->usuario->indexProduct($min_query);
            return view('usuario/index', $results);
    }
    function crear(){
        checkAuthentication("../user/login");

            if (isset($_POST['available']))
                $available = 1;
            else
                $available = 0;

            $data = array(
                'description'   => $_POST['description'],
                'category'      => $_POST['category'],
                'available'     => $available
            );

            $usuario = [
                "nombreUsuario"   => $_POST['nombreUsuario'],
                "contrasena"    => $_POST['contrasena'],
                "tipo" => "alumno",
            ];

            $this->product_model->storeProduct($data);
            
            header("location: ../product/");
    }

    function actualizar(){
        checkAuthentication("../../user/login");
            
        $results = $this->usuario->showProduct($id);
        return view('product/edit', $results);
    }

    function borrar(){
        $consultaSQL = "DELETE FROM usuarios WHERE id =" $id;
        $resultado = $this->conexion->query($sql);
    }
}
    
?>