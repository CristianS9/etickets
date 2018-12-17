<?php
    class Usuario_Model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public function getAlumnos(){
            return $this->db->get("alumnos")->result();
        }

    }

?>