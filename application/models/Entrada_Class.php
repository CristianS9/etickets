<?php
    class Entrada_Class{
        private $id;
        private $idUsuario;
        private $idEntradaEvento;
        private $identificador;
        private $idVenta;
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
        public function setIdEtradaEvento($idEntradaEvento){
            $this->idEntradaEvento = $idEntradaEvento;
        }
        public function getIdentificador(){
            return $this->identificador;
        }
        public function setIdentificador($identificador){
            $this->identificador = $identificador;
        }
        public function getIdVenta(){
            return $this->idVenta;
        }
        public function setIdVenta($idVenta){
            $this->idVenta = $idVenta;
        }
    }

?>