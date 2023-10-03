<?php

    class Alumno{
        private $nombre, $apellido, $email, $edad;

        public function __construct($nombre, $apellido, $email, $edad){
            $this->nombre = $nombre;
            $this->apellido= $apellido;
            $this->email = $email;
            $this->edad = $edad;
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombreUsuario)
        {
            $this->nombreUsuario = $nombreUsuario;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getEdad()
        {
            return $this->edad;
        }
        public function setEdad($edad)
        {
            $this->edad = $edad;
        }
        public function selectAlumnos(){

        }
        public function crearAlumno(){

        }
        public function borrarAlumno(){

        }
        public function editarAlumno(){
            
        }


    }


?>