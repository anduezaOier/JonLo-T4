<?php
    use ModelBase.php;
    class Alumno extends ModelBase{
        private $nombre, $apellido, $email, $edad;
        private $model_base;

        public function __construct() {
            // Heredamos propiedades y métodos de la clase 'madre'
            parent::__construct();
            $this->model_base = new ModelBase;
        }
        public function selectAlumnos(){
            try{

                $conditions = $min_query !== null ? "WHERE nombre LIKE :min_query" : "";
                $query_params = [ ':min_query' => "%$min_query%" ];

                return $this->model_base->index('product', $conditions, $query_params);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function crearAlumno(){
            try{
                $this->model_base->store('alumno', $data);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function borrarAlumno(){
            try{
                $this->model_base->update('alumno', $data, $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function editarAlumno(){
            try{
                $this->model_base->update('alumno', $data, $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function borrarAlumno(){
            try{
                $this->model_base->destroy('alumno', $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
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