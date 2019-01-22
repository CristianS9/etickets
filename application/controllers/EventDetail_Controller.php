<?php

class EventDetail_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('html');
        $this->load->library('session');

    }
    public function eventDetails() {

        $this->load->model("Evento_Model");
        $this->load->model("ShoppingCart_Model");

        $data['datos'] = $this->Evento_Model->getEventDetails();
        $data['eventTickets'] = $this->Evento_Model->getEventTickets();
        if (isset($this->session->id)) {
            $data['userCart'] = $this->ShoppingCart_Model->getShoppingCart($this->session->id);
        }
        $data['eventComments'] = $this->Evento_Model->getEventComments();
        $data['userName'] = $this->session->usuario;

        $this->load->view("event_detail", $data);

    }

}
