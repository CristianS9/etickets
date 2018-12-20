<?php
class Evento_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEventDetails() {
        $eventId = $this->uri->segment("2");
        $query = $this->db->query("CALL getSingleEventInfo(" . $eventId . ")");
        $this->db->close();
        return $query->result();
    }

    public function getEventTickets() {
        $eventId = $this->uri->segment("2");
        $query = $this->db->query("CALL getEventDaysInfo(" . $eventId . ")");
        $this->db->close();
        return $query->result();

    }

    public function getEventComments() {
        $eventId = $this->uri->segment("2");
        $query = $this->db->query("CALL spGetEventComments(" . $eventId . ")");
        $this->db->close();
        return $query->result();
    }
}
