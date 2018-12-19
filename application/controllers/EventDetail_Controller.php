<?php

class EventDetail_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
    public function eventDetails() {

        $this->load->model("Evento_Model");

        $data['datos'] = $this->Evento_Model->getEventDetails();

        $this->load->helper("url");
        $this->load->view("event_detail", $data);

    }

}
