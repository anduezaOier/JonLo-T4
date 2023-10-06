<?php
    use ModelBase;
    class Usuario extends ModelBase{
        private $nombreUsuario, $password, $tipo, $asignatura;
        private $model_base;

        public function __construct() {
            // Heredamos propiedades y métodos de la clase 'madre'
            parent::__construct();
            $this->model_base = new ModelBase;
        }

        public function crearUsuario(){
            try{
                $this->model_base->store('usuario', $data);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function borrarUsuario(){
            try{
                $this->model_base->update('usuario', $data, $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function editarUsuario(){
            try{
                $this->model_base->update('usuario', $data, $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        public function borrarUsuario(){
            try{
                $this->model_base->destroy('usuario', $id);
            } catch (\PDOException $e) {
                echo $e->getMessage();
		    }
        }
        // public function getNombreUsuario()
        // {
        //     return $this->nombreUsuario;
        // }
        // public function setNombreUsuario($nombreUsuario)
        // {
        //     $this->nombreUsuario = $nombreUsuario;
        // }
        // public function getPassword()
        // {
        //     return $this->password;
        // }
        // public function setPassword($password)
        // {
        //     $this->password = $password;
        // }
        // public function getTipo()
        // {
        //     return $this->tipo;
        // }
        // public function setTipo($tipo)
        // {
        //     $this->tipo = $tipo;
        // }
        // public function getAsignatura()
        // {
        //     return $this->asignatura;
        // }
        // public function setAsignatura($asignatura)
        // {
        //     $this->asignatura = $asignatura;
        // }

    }


?>