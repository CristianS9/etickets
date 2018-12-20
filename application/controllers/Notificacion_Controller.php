<?php
    class Notificacion_Controller extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->helper("html");
        }
        public function index($tipo,$num){
            $mensaje = [];
            $mensaje["notificacion"] = [];
            $mensaje["error"] = [
                1 => "Este usuario ya existe"
                ,2 => "Las contraseñas no coinciden"
                ,3 => "Este correo electronico ya existe"
            ];
            $mensaje["aviso"] =[];


            $data["tipo"] = ucfirst($tipo);
            $data["mensaje"] = $mensaje[$tipo][$num];
            $this->load->view("notificacion_view",$data);   
        }
        
        

    }

?>