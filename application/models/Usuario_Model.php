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
      
    }

?>