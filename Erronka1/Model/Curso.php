<?php

    class Curso{
        private $nombre, $descripcion, $codigo, $idioma;

        public function __construct($nombre, $descripcion, $codigo, $idioma){
            $this->nombre = $nombre;
            $this->descripcion= $descripcion;
            $this->codigo = $codigo;
            $this->idioma = $idioma;
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getDescripcion()
        {
            return $this->descripcion;
        }
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }
        public function getCodigo()
        {
            return $this->codigo;
        }
        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }
        public function getIdioma()
        {
            return $this->idioma;
        }
        public function setIdioma($idioma)
        {
            $this->idioma = $idioma;
        }

    }


?>