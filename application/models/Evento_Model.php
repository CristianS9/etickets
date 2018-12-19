<?php
class Evento_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEventDetails() {
        $query = $this->db->query("CALL getSingleEventInfo(3)");
        return $query->result();        
    }
}
?>