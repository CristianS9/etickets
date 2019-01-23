<?php
class Perfil_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['html','url','form']);
        $this->load->database();
        $this->load->library("session");
        $this->load->model("Usuario_Model");
        $this->load->model("Correo");
        $this->Usuario_Model->login_necesario();
    }
    public function index() {
        $result = $this->db->get("ventas");
        $data["ventas"] = $result->result();
        $id = $this->session->id;
        $usuario = $this->db->query("CALL spUsuarioPorId($id)");
        $data["usuario"] = $usuario->result();
        $this->db->close();
        // $this->Correo->compra(60);
        $this->load->view("perfil_view", $data);
    }
    public function logOut(){
        $this->session->unset_userdata('id');
        redirect("Home_Controller");
    }
    
}
?>