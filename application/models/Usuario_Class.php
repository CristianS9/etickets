<?php
    class Usuario_Class{
        private $id;
        private $rango;
        private $usuario;
        private $contrasena;
        private $nombre;
        private $apellidos;
        private $correo;
        private $telefono;
        private $confirmado;

        public function __constructor(){

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
        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function getContrasena(){
            return $this->contrasena;
        }
        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->setNombre();
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getConfirmado(){
            return $this->confirmado;
        }
        public function setConfirmado($confirmado){
            $this->confirmado = $confirmado;
        }

    }


?>