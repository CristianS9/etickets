<?php
class Ventas_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url']); 
        $this->load->database(); 
    }

    public function index(){
        $query = $this->db->query("CALL spDatosVenta");
        $data["ventas"] = $query->result();

        $this->load->helper("url");
        $this->load->view("ventas_view",$data);
    }
}

?>