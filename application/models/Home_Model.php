<?php
class Home_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHomeEvents() {
        $query = $this->db->query("CALL spGetAllEventsForIndex()");
        return $query->result();

        
    }

}
