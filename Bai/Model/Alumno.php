<?php
    function getConnection() {
        // $user = 'root';
        // $pwd = '';
        // return new PDO('mysql:host=localhost;dbname=erronka1', $user, $pwd);
        $config = include '../config.php';
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        return $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    }
    
    class Alumno{
        private $alumno;
        private $db;

        public function __construct() {
            // Heredamos propiedades y métodos de la clase 'madre'
            $config = include '../config.php';
            $this->alumno = array();
            //$this->db= new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        }

        public function crearAlumno($data){
            $db = getConnection();
            //$consulta="INSERT INTO alumnos VALUES (". $data .")";
            // $consulta ="INSERT INTO alumnos (nombre, apellido, email, edad)";
            // $consulta = "VALUES (:". implode(", :", array_keys($data)) .")";
            $consulta = "INSERT INTO alumnos (dni, nombre, apellido, email, edad) VALUES (:dni, :nombre, :apellido, :email, :edad)";
            // Prepare the SQL statement
            $sentencia = $db->prepare($consulta);

            // Bind the values from the $data array to the placeholders
            $sentencia->bindParam(':dni', $data['dni']);
            $sentencia->bindParam(':nombre', $data['nombre']);
            $sentencia->bindParam(':apellido', $data['apellido']);
            $sentencia->bindParam(':email', $data['email']);
            $sentencia->bindParam(':edad', $data['edad']);
            $sentencia = $db->prepare($consulta);
            $sentencia->execute($data);
            // try{
            //     $this->model_base->store('alumnos', $data);
            // } catch (\PDOException $e) {
            //     echo $e->getMessage();
		    // }
        }
        public function borrarAlumno($id){
            $db = getConnection();
            $consulta = "DELETE FROM alumnos WHERE id = ".$id;
            // Prepare the SQL statement
            $sentencia = $db->prepare($consulta);
            $sentencia->execute();
            // try{
            //     $this->model_base->update('alumnos', $data, $id);
            // } catch (\PDOException $e) {
            //     echo $e->getMessage();
		    // }
        }
        public function editarAlumno($data, $id){
            $db = getConnection();
            $consulta="UPDATE alumnos SET dni = (:dni), nombre = (:nombre), apellido = (:apellido), email = (:email), edad = (:edad) WHERE id = " . $id;   
            $sentencia = $db->prepare($consulta);
            // Bind the values from the $data array to the placeholders
            $sentencia->bindParam(':dni', $data['dni']);
            $sentencia->bindParam(':nombre', $data['nombre']);
            $sentencia->bindParam(':apellido', $data['apellido']);
            $sentencia->bindParam(':email', $data['email']);
            $sentencia->bindParam(':edad', $data['edad']);
            $sentencia = $db->prepare($consulta);
            $sentencia->execute($data);

            // try{
            //     $this->model_base->update('alumnos', $data, $id);
            // } catch (\PDOException $e) {
            //     echo $e->getMessage();
		    // }
        }
    }
        
?>