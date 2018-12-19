<?php
class Evento_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->database(); 
    }
    
    public function index(){
        $query = $this->db->get("eventos");
        $data["todo"] = $query->result();
    
        $this->load->helper("url");
        $this->load->view("evento_view",$data);
    }

    public function add_evento_view(){
        $this->load->model("Evento_Model");
        $data['provincias'] = $this->Evento_Model->cargarProvincias();

        $this->load->helper("url");
        $this->load->view("evento_add_view",$data);
    }

    public function add_evento(){    
        $this->load->model("Evento_Model");
        $datos = [
            "nombre" => $this->input->post("nombre"),
            "descripcion" => $this->input->post("descripcion"),
            "precio" => $this->input->post("precio"),
            "fecha_inicio" => $this->input->post("fecha_inicio"),
            "fecha_fin" => $this->input->post("fecha_fin"),
            "cantidad" => $this->input->post("cantidad"),
            "provincia" => $this->input->post("provincia"),
            "sitio" => $this->input->post("sitio")
        ];

        $this->Evento_Model->insertar($datos);
        $query= $this->db->get("eventos");
        
        redirect("Evento_Controller");
    }
    
    public function del_evento(){
        $this->load->model("Evento_Model");
        $id = $this->uri->segment("3");
        
        $condicion = [
            "id" => $id
        ];
        $this->Evento_Model->borrar($condicion);
        redirect("Evento_Controller");

    }
}

?>