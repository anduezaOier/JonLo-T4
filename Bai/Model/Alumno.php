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
        public function selectAlumnos($table){
            // $consulta="SELECT * from ". $table;
            // $resultado=$this->db->query($consulta);
            // while($filas = $resultado->fetchAll(PDO::FETCH_ASSOC)){
            //     $this->alumno[]=$filas;
            // }
            // return $this->alumno;
            // try{

            //     $conditions = $min_query !== null ? "WHERE nombre LIKE :min_query" : "";
            //     $query_params = [ ':min_query' => "%$min_query%" ];

            //     return $this->model_base->index('product', $conditions, $query_params);
            // } catch (\PDOException $e) {
            //     echo $e->getMessage();
		    // }
        }
        public function getAlumnos(){
            $db= getConnection();
            $result = $db->query('SELECT * FROM alumnos');
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
            //$alumnos = array();
            // while ( $alumno = $result->fetch() )
            //     $alumnos[] = $alumno;
            // $sentencia = $db->prepare($result);
            // $sentencia->execute();         
            // $alumnos = $sentencia->fetchAll();      
            // return $alumnos;
        }
        public function getAlumno($id){
            $db = getConnection();
            $query = 'SELECT * FROM libros WHERE id = '.$id;
            $stmt = $db->prepare($query);
            $stmt->execute(array($id));
            $alumno = $stmt->fetch();
            return $alumno;
        }
        
        public function crearAlumno($data){
            $db = getConnection();
            //$consulta="INSERT INTO alumnos VALUES (". $data .")";
            // $consulta ="INSERT INTO alumnos (nombre, apellido, email, edad)";
            // $consulta = "VALUES (:". implode(", :", array_keys($data)) .")";
            $consulta = "INSERT INTO alumnos (nombre, apellido, email, edad) VALUES (:nombre, :apellido, :email, :edad)";
            // Prepare the SQL statement
            $sentencia = $db->prepare($consulta);

            // Bind the values from the $data array to the placeholders
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
        public function editarAlumno($table, $data, $condition){
            $consulta="UPDATE ". $table ." SET ". $data ." WHERE " . $condition;
            $resultado=$this->db->query($consulta);
            if($resultado){
                return true;
            }else{
                return false;
            }
            // try{
            //     $this->model_base->update('alumnos', $data, $id);
            // } catch (\PDOException $e) {
            //     echo $e->getMessage();
		    // }
        }
    }
        // public function getNombre()
        // {
        //     return $this->nombre;
        // }
        // public function setNombre($nombreUsuario)
        // {
        //     $this->nombreUsuario = $nombreUsuario;
        // }
        // public function getApellido()
        // {
        //     return $this->apellido;
        // }
        // public function setApellido($apellido)
        // {
        //     $this->apellido = $apellido;
        // }
        // public function getEmail()
        // {
        //     return $this->email;
        // }
        // public function setEmail($email)
        // {
        //     $this->email = $email;
        // }
        // public function getEdad()
        // {
        //     return $this->edad;
        // }
        // public function setEdad($edad)
        // {
        //     $this->edad = $edad;
        // }

?>