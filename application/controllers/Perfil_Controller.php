<?php
class Perfil_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['html','url','form']);
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
        redirect("Home_Controller");
    }
    public function modUser(){
        $datos = [
            "id" => $this->session->id,
            "username" => $this->input->post("p_Username"),
            "nombre" => $this->input->post("p_Nombre"),
            "apellido" => $this->input->post("p_Apellido"),
            "correo" => $this->input->post("p_Correo"),
            "telefono" => $this->input->post("p_Telefono")
        ];
        $this->Usuario_Model->modUser($datos);
    }

}
?>