<?php
class Venta_Model extends CI_MODEL{
    function __construct() { 
        parent::__construct(); 
    } 

    public function viewEventos(){
        $query = $this->db->get("ventas");
        return $query->result();
    }

    
}
    
?>