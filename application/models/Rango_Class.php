<?php
    class Rango_Class{
        private $id;
        private $rango;

        public function __construct(){

        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getRango(){
            return $this->rango;
        }
        public function setRango($rango){
            $this->rango = $rango;
        }
    }


?>