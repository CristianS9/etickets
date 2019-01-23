<?php
class Ventas_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url',"html"]); 
        $this->load->database(); 
    }

    public function index(){
        $query = $this->db->query("CALL spDatosVenta");
        $data["ventas"] = $query->result();

        $this->load->view("ventas_view",$data);
    }
    public function entradasCompra($id){
        //$cambio =  base64_encode(base64_encode(base64_encode($id)));
        $entradas = $this->db->query("CALL spDetallesEntradas($id)")->result();
        $data["entradas"] = $entradas;
        $this->load->view("entradasCompra",$data); 
    }
}

?>