<?php
    class Venta_Class{
        private $id;
        private $idUsuario;
        private $idEntradaEvento;
        private $cantidad;
        private $precio_total;
        private $fecha;
        public function __construct(){

        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }
        public function getIdEntradaEvento(){
            return $this->idEntradaEvento;
        }
        public function setIdEntradaEvento($idEntradaEvento){
            $this->getIdEntradaEvento = $idEntradaEvento;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }
        public function getPrecio_total(){
            return $this->precio_total;
        }
        public function setPrecio_total($precio_total){
            $this->precio_total = $precio_total;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
    }


?>