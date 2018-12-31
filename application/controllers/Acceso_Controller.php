<?php
    class Acceso_Controller extends CI_Controller{
        public function __construct(){
           parent::__construct();
           $this->load->helper("html");
           $this->load->helper("url");
           $this->load->database(); 
        }
        public function index(){
            $this->load->view("login_view"); 
        }
        public function login(){
            $log_usuario = $this->input->post("log_usuario"); 
            $log_contrasena = $this->input->post("log_contrasena");
            $this->load->model("Usuario_Model");
            $this->Usuario_Model->login_correcto($log_usuario,$log_contrasena);

            // Si llega significa que los datos son correctos
            

        }
        public function registro_view(){
            $this->load->view("registro_view");
        }
        public function registro(){
            $this->load->model("Usuario_Model");
            $reg_usuario = $this->input->post("reg_usuario");
            $reg_contrasena = $this->input->post("reg_contrasena");
            $reg_r_contrasena = $this->input->post("reg_r_contrasena");
            $reg_nombre = $this->input->post("reg_nombre");
            $reg_apellidos = $this->input->post("reg_apellidos");
            $reg_email = $this->input->post("reg_email");
            $reg_telefono = $this->input->post("reg_telefono");
            
            $this->Usuario_Model->minimos_registro($reg_usuario,$reg_contrasena,$reg_nombre,$reg_apellidos,$reg_email,$reg_telefono);
            $this->Usuario_Model->usuarioExiste($reg_usuario); 
            $this->Usuario_Model->emailExiste($reg_email);
            $this->Usuario_Model->contrasenaIgual($reg_contrasena,$reg_r_contrasena);
            
            // Si llega es que todo esta bien
            $this->Usuario_Model->registrar($reg_usuario,$reg_contrasena,$reg_nombre,$reg_apellidos,$reg_email,$reg_telefono);
            echo "usuario registrado correctamente";            
            redirect("/acceso_controller");
            
        }
    }


?>