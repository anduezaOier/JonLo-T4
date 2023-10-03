<?php
    class ConexionBD {
        private $conexion;

        public function establecerConexion($host, $usuario, $contrasena, $db) {
            $this->conexion = new mysqli($host, $usuario, $contrasena, $db);

            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }

        public function obtenerConexion() {
            return $this->conexion;
        }
    }

    class Usuario{
        private $nombreUsuario, $password, $tipo, $asignatura;
        private $conexion;

        public function establecerConexion($conexion) {
            $this->conexion = $conexion;
        }

        public function __construct($nombreUsuario, $password, $tipo, $asignatura){
            $this->nombreUsuario = $nombreUsuario;
            $this->password= $password;
            $this->tipo = $tipo;
            $this->asignatura = $asignatura;
        }

        public function getNombreUsuario()
        {
            return $this->nombreUsuario;
        }
        public function setNombreUsuario($nombreUsuario)
        {
            $this->nombreUsuario = $nombreUsuario;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword($password)
        {
            $this->password = $password;
        }
        public function getTipo()
        {
            return $this->tipo;
        }
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }
        public function getAsignatura()
        {
            return $this->asignatura;
        }
        public function setAsignatura($asignatura)
        {
            $this->asignatura = $asignatura;
        }

        public function crearUsuario($nombreUsuario, $password, $tipo) {
        
            if(){

            }
            $consultaSQL = "INSERT INTO usuarios ($nombreUsuario, $password, $tipo)";
            $resultado = $this->conexion->query($sql);

            return $resultado;
    }

    }


?>