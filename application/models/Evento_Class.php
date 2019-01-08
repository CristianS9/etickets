<?php
    class Evento_Class {
        private $id;
        private $nombre;
        private $descripcion;
        private $fecha_inicio;
        private $fecha_fin;
        
        public function __construct(){

        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function getFecha_inicio(){
            return $this->fecha_inicio;
        }
        public function setFecha_inicio($fecha_inicio){
            $this->fecha_inicio = $fecha_inicio;
        }
        public function getFecha_fin(){
            return $this->fecha_fin;
        }
        public function setFecha_fin($fecha_fin){
            $this->fecha_fin = $fecha_fin;
        }
    }


?>