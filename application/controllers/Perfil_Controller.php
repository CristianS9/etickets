<?php
class Perfil_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("html");
        $this->load->helper("url");
        $this->load->database();
        $this->load->library("session");
        $this->load->model("Usuario_Model");
        $this->Usuario_Model->login_necesario();
    }
    public function index() {
        $result = $this->db->get("ventas");
        $data["todo"] = $result->result();

        
        $this->load->view("perfil_view", $data);
    }
    public function logOut(){
        $this->session->unset_userdata('id');
    }

}
?>