<?php
    class Usuario_Model extends CI_Model {

        function __construct() { 
            parent::__construct(); 
            $this->load->database(); 
            $this->load->library("session");
            //$this->load->helper("url");
        } 
        public function getUsuarios(){
            return $this->db->get("usuario")->result();
        }
        public function confirmarToken($token){
            $id = $this->db->query("CALL spConfirmarCorreo(\"$token\")");
            $this->db->close();
        
        }
        public function loginCorrecto($usuario,$contrasena){
            $condicion = [
                "usuario" => $usuario
            ];
            $hash = $this->db->get_where("usuarios",$condicion)->row("contrasena");
            return password_verify($contrasena,$hash);
          
        }
        public function idUsuario($usuario){
            $condicion = [
                "usuario" => $usuario
            ];
            return $this->db->get_where("usuarios",$condicion)->row("id");
        }
        public function login_necesario(){
            if(!isset($this->session->id)){
                redirect("acceso");
            };

            

        }
      
    }

?>