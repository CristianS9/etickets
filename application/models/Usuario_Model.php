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
                redirect("/acceso_controller/err/1");
            };
        }
        public function contrasenaIgual($contrasena,$repetida){
            if($contrasena!=$repetida){
                redirect("/acceso_controller/err/2");
            }
        }
        public function emailExiste($email){
            $condicion = ["email"=>$email];
            $query = $this->db->get_where("usuarios",$condicion);

            if($query->row("email")){
                redirect("/acceso_controller/err/3");
            }
        }

    }

?>