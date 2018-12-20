<?php
    class Usuario_Model extends CI_Model {

        function __construct() { 
            parent::__construct(); 
            $this->load->database(); 
            //$this->load->helper("url");
        } 
        public function getUsuarios(){
            return $this->db->get("usuario")->result();
        }
        public function usuarioExiste($usuario){
            $condicion = ["usuario"=>$usuario];
            $query = $this->db->get_where("usuarios",$condicion);
            if($query->row("usuario")){
                redirect("/notificacion/error/1");
            };
        }
        public function contrasenaIgual($contrasena,$repetida){
            if($contrasena!=$repetida){
                redirect("/notificacion/error/2");
            }
        }
        public function emailExiste($email){
            $condicion = ["email"=>$email];
            $query = $this->db->get_where("usuarios",$condicion);

            if($query->row("email")){
                redirect("/notificacion/error/3");
            }
        }

    }

?>