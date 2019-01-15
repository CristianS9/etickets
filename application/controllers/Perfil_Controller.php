<?php
class Perfil_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("html");
        $this->load->helper("url");
        $this->load->database();
        $this->load->library("session");
    }
    public function index() {
        $result = $this->db->get("ventas");
        $data["todo"] = $result->result();

        
        $this->load->view("perfil_view", $data);
    }
}
?>