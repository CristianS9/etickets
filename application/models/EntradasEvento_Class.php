<?php
    class EntradaEvento_Class{
        private $id;
        private $idEvento;
        private $cantidad;
        private $disponibles;
        private $fecha;
        private $idProvincia;
        private $sitio;
        private $precio;
        public function __construct(){
            
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getIdEvento(){
            return $this->idEvento;
        }
        public function setIdEvento($idEvento){
            $this->idEvento;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }
        public function getDisponibles(){
            return $this->disponibles;
        }
        public function setDisponibles($disponibles){
            $this->disponibles = $disponibles;
        }
        public function getFecha(){
            return $fecha;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getIdProvincia(){
            return $this->idProvincia;
        }
        public function setIdProvincia($idProvincia){
            $this->getIdProvincia = $idProvincia;
        }
        public function getSitio(){
            return $this->sitio;
        }
        public function setSitio($sitio){
            $this->sitio = $sitio;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
    }
    
    
    ?>