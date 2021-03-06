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
        $id = $this->session->id;
        $query = $this->db->get_where('ventas', array('idUsuario' => $id));
        $data["ventas"] = $query->result();
        $this->db->close();

        $usuario = $this->db->query("CALL spUsuarioPorId($id)");
        $data["usuario"] = $usuario->result();
        $this->db->close();
        
        $tickets = $this->db->query("CALL spDetallesAllEntradas()");
        $data["tickets"] = $tickets->result();
        $this->db->close();

        $this->load->view("perfil_view", $data);

    }

    public function logOut(){
        $this->session->unset_userdata('id');
        redirect("Home_Controller");
    }
    
}
?>