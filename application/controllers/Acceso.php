<?php
    class Acceso extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper("html");
            $this->load->helper("url");
            $this->load->database(); 
           $this->load->library('form_validation');
        }
        public function index(){
            $this->load->view("acceso/login"); 
        }
        public function registro(){
            $this->load->view("acceso/registro");
        }
        public function registrar(){

            $this->form_validation->set_message("is_unique","{field} ya existe");
            $this->form_validation->set_message("required","Debes de introducir {field}");
            $this->form_validation->set_message("min_length","Debes introducir minimo {param}");
            $this->form_validation->set_message("max_length","Debes introducir maximo {param}");
            $this->form_validation->set_message("matches","Las contraseñas no coinciden");
            $this->form_validation->set_message("regex_match","La contraseña debe contener mayuscula,minuscula, un numero y un caracter especial");
            
            
            $this->form_validation->set_rules('reg_usuario', 'Usuario', 'required|is_unique[usuarios.nombre]|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('reg_contrasena', 'Contrasena', 'required|min_length[4]|max_length[20]|regex_match[/^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/]');
            $this->form_validation->set_rules('reg_r_contrasena', 'Repetir Contraseña', 'matches[reg_contrasena]');
            $this->form_validation->set_rules('reg_nombre', 'Nombre', 'required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('reg_apellidos', 'Apellidos', 'required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('reg_email', 'Email', 'required|is_unique[usuarios.email]|min_length[4]|max_length[25]');
            $this->form_validation->set_rules('reg_telefono', 'Telefono', 'required|min_length[9]|max_length[9]'); 
            if ($this->form_validation->run() == FALSE){
                $this->load->view("acceso/registro");
            } else {
                $usuario = $this->input->post("reg_usuario");
                $email = $this->input->post("reg_email");
                $token = md5(uniqid(rand(), true));
                $datos =[
                    $usuario,
                    password_hash($this->input->post("reg_contrasena"),PASSWORD_BCRYPT),
                    $this->input->post("reg_nombre"),
                    $this->input->post("reg_apellidos"),
                    $email,
                    $this->input->post("reg_telefono"),
                    $token
                    
                ];
                
                $this->db->query("Call spRegistrarUsuario(\"$datos[0]\",\"$datos[1]\",\"$datos[2]\",\"$datos[3]\",\"$datos[4]\",\"$datos[5]\",\"$datos[6]\")");
               
                $this->load->model("Correo");
                $this->Correo->registro($usuario,$email,$token);

            }
        }

    }


?>