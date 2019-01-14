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
            $this->db->trans_start();
                $id = $this->db->query("CALL spDuenoToken(\"$token\")")->row()->idUsuario;
                $this->db->close();
                $this->db->query("CALL spConfirmarCorreo($id)");
                $this->db->close();
                $this->db->query("CALL spUsuarioConfirmado($id)");
                $this->db->close();
            $this->db->trans_complete();
        }
      
    }

?>