<?php
    function getConnection() {
        // $user = 'root';
        // $pwd = '';
        // return new PDO('mysql:host=localhost;dbname=erronka1', $user, $pwd);
        $config = include '../config.php';
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        return $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    }
    class Usuario {
        private $usuario;
        private $db;

        public function __construct() {
            // Heredamos propiedades y métodos de la clase 'madre'
            $config = include '../config.php';
            $this->usuario = array();
        }
        // public function indexUsuario($min_query){
        //     try{
        //         $conditions = $min_query !== null ? "WHERE nombreUsuario LIKE :min_query" : "";
        //         $query_params = [ ':min_query' => "%$min_query%" ];

        //         return $this->model_base->index('usuarios', $conditions, $query_params);
        //     } catch (\PDOException $e) {
        //         echo $e->getMessage();
		//     }
        // }
        // public function mostrarUsuario($id){
        //     try{
        //         return $this->model_base->show('usuarios', $id);
        //     } catch (\PDOException $e) {
        //         echo $e->getMessage();
		//     }
        // }
        public function crearUsuario($data){
            $db = getConnection();
            //$consulta="INSERT INTO alumnos VALUES (". $data .")";
            // $consulta ="INSERT INTO alumnos (nombre, apellido, email, edad)";
            // $consulta = "VALUES (:". implode(", :", array_keys($data)) .")";
            $consulta = "INSERT INTO usuarios (dni, nombreUsuario, contrasena, tipo) VALUES (:dni, :nombreUsuario, :contrasena, :tipo)";
            // Prepare the SQL statement
            $sentencia = $db->prepare($consulta);

            // Bind the values from the $data array to the placeholders
            $sentencia->bindParam(':dni', $data['dni']);
            $sentencia->bindParam(':nombreUsuario', $data['nombreUsuario']);
            $sentencia->bindParam(':contrasena', $data['contrasena']);
            $sentencia->bindParam(':tipo', $data['tipo']);
            $sentencia = $db->prepare($consulta);
            $sentencia->execute($data);
        }
         public function borrarUsuario($id){
        //     try{
        //         $this->model_base->destroy('usuarios', $id);
        //     } catch (\PDOException $e) {
        //         echo $e->getMessage();
		//     }
            $db = getConnection();
            $consulta = "DELETE FROM usuarios WHERE id = ".$id;
            // Prepare the SQL statement
            $sentencia = $db->prepare($consulta);
            $sentencia->execute();
        }
        public function editarUsuario($data, $id){
        //     try{
        //         $this->model_base->update('usuarios', $data, $id);
        //     } catch (\PDOException $e) {
        //         echo $e->getMessage();
		//     }
        }
        public function usuarioCurso($data, $id){
            $db = getConnection();
            $consulta="UPDATE usuarios SET curso = ".$data." WHERE id = (:id)";   
            $sentencia = $db->prepare($consulta);
            // Bind the values from the $data array to the placeholders
            //$sentencia->bindParam(':curso', $id['curso']);
            //$sentencia->bindParam(':curso', $data['curso']);
            $sentencia->bindParam(':id', $id['laid']);
            $sentencia->execute();
        }
        

    }


?>