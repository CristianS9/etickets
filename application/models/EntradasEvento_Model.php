<?php
class EntradasEvento_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addToShoppingCart($userId, $entradaEventoId){
        $this->db->query("CALL spInsertIntoShoppingCart(".$userId.",".$entradaEventoId.")");
        $this->db->close();

    }
    }
?>
