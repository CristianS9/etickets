<?php
    class Comentario_Class{
        private $id;
        private $idUsuario;
        private $idEvento;
        private $comentario;
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
        public function getIdEvento(){
            return $this->idEvento;
        }
        public function setIdEvento($idEvento){
            $this->idEvento = $idEvento;
        }
        public function getComentario(){
            return $this->comentario;
        }
        public function setComentario(){
            $this->comentario = $comentario;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function setFecha(){
            $this->fecha = $fecha;
        }
    }


?>