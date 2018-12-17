<?php
    class Confirmacion_Class{
        private $id;
        private $idUsuario;
        private $confirmacion;
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
        public function getConfirmacion(){
            return $this->confirmacion;
        }
        public function setConfirmacion($confirmacion){
            $this->confirmacion = $confirmacion;
        }
    }


?>