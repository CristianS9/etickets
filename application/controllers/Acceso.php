<?php
    class Acceso extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper("html");
            $this->load->helper("url");
            $this->load->helper("cookie");
            $this->load->database(); 
            $this->load->library('form_validation');
            $this->load->library("session");
            $this->load->model("Usuario_Model");
        }
        public function index(){
            $this->Usuario_Model->sin_login();
            if($this->input->post("log_usuario") !=null){
                $this->login();
            } else {
                $this->load->view("acceso/login"); 
            } 
        }
        public function registro(){
            $this->Usuario_Model->sin_login();
            //            echo get_cookie("ultimo-login");
            if($this->input->post("reg_usuario") !=null){
                $this->registrar();
            } else {
                $this->load->view("acceso/registro");
            }
        }
        public function registrar(){
            if(!$this->input->post("reg_usuario")){
                redirect("registro");
            }
            $this->form_validation->set_message("is_unique","{field} ya existe");
            $this->form_validation->set_message("required","Debes de introducir {field}");
            $this->form_validation->set_message("min_length","Debes introducir minimo {param}");
            $this->form_validation->set_message("max_length","Debes introducir maximo {param}");
            $this->form_validation->set_message("matches","Las contraseñas no coinciden");
            $this->form_validation->set_message("regex_match","La contraseña debe contener mayuscula,minuscula, un numero y un caracter especial");
            
            
            $this->form_validation->set_rules('reg_usuario', 'Usuario', 'required|is_unique[usuarios.usuario]|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('reg_contrasena', 'Contraseña', 'required|min_length[4]|max_length[20]|regex_match[/^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/]');
            $this->form_validation->set_rules('reg_r_contrasena', 'Repetir Contraseña', 'matches[reg_contrasena]');
            $this->form_validation->set_rules('reg_nombre', 'Nombre', 'required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('reg_apellidos', 'Apellidos', 'required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('reg_email', 'Email', 'required|is_unique[usuarios.email]|min_length[4]|max_length[25]');
            $this->form_validation->set_rules('reg_telefono', 'Telefono', 'required|min_length[9]|max_length[9]'); 

            if ($this->form_validation->run() == FALSE){
                $data = [
                    "usuario" => $this->input->post("reg_usuario"),
                    "nombre" => $this->input->post("reg_nombre"),
                    "apellidos" => $this->input->post("reg_apellidos"),
                    "email" => $this->input->post("reg_email"),
                    "telefono" => $this->input->post("reg_telefono")
                ];
                $this->load->view("acceso/registro",$data);
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
                $this->load->model("Usuario_Model");
            

                redirect("login");

            }
        }
        public function confirmarRegistro($token){
            $this->load->model("Usuario_Model");
            $this->Usuario_Model->confirmarToken($token);
            redirect("login");

        }
        public function login(){
            if(!$this->input->post("log_usuario")){
                redirect("login");
            }
            $usuario= $this->input->post("log_usuario");
            $contrasena= $this->input->post("log_contrasena");
            $this->load->model("Usuario_Model");
            if($this->Usuario_Model->loginCorrecto($usuario,$contrasena)){
                $datosLogin = $this->Usuario_Model->datosLogin($usuario);
                $this->session->set_userdata("id",$datosLogin->id);
                $this->session->set_userdata("usuario",$usuario);
                $this->session->set_userdata("rango",$datosLogin->rango);
                
                if($datosLogin->confirmado=="0"){
                    redirect("confirmacionNecesaria");
                }

              /*   set_cookie("nombre",$datosLogin->nombre);
                $fecha = date("Y-m-d H:i:s"); 
                $cookie = array(
                        'name'   => 'ultimo-login',
                        'value'  => $fecha,                            
                        'expire' => '0',                                                                                   
                        'secure' => TRUE
                        );
                set_cookie($cookie); */
                redirect("home");
            }else {
                $this->form_validation->setError('credenciales',"Credenciales de acceso incorrectos");
                $data["usuario"] = $usuario;
                $data["contrasena"] = $contrasena;
                $this->load->view("acceso/login",$data); 
            }
        }
        public function logout(){
            $this->session->unset_userdata("id");
            $this->session->unset_userdata("usuario");
            $this->session->unset_userdata("rango");
            redirect("home");
        }
        public function confirmacionNecesaria(){
            $this->load->view("acceso/confirmacionNecesaria");
        }
        public function recuperacion(){
            if($this->input->post("rec_email") !=null){
                $this->recuperar();
            } else {
                $this->load->view("acceso/recuperacionContrasena");
            }
           
        }
        public function recuperar(){
            $email = $this->input->post("rec_email");
            $usuario = $this->input->post("rec_usuario");
            $telefono = $this->input->post("rec_telefono");
            if($usuario != null){
                $elemento = "usuario";
                $dato = $usuario;
            } else if($telefono !=null){ 
                $elemento ="telefono";
                $dato = $telefono;
            } 
       
            $this->load->model("Usuario_Model");
            $condicion = [
                "email" => $email,
                $elemento => $dato
            ];
            $id = $this->Usuario_Model->recuperacionCorrecto($condicion);
          
            if($id!="0"){
                $codigo = $this->Usuario_Model->generarContrasenaTemporal($id);
                $this->load->model("Correo");
                $this->Correo->recuperacion($email,$codigo);
                
            } 
            redirect("home");
            
        }
        public function temporal($codigo){
            $this->load->model("Usuario_Model");
            $linea = $this->Usuario_Model->datosTemporal($codigo);
            if($linea != null){
                $condicion = ["id"=>$linea->id];
                $this->db->delete("recuperacion_contrasena",$condicion);
                $datosLogin = $this->Usuario_Model->datosLoginId($linea->idUsuario);
                $this->session->set_userdata("id",$datosLogin->id);
                $this->session->set_userdata("usuario",$datosLogin->usuario);
                $this->session->set_userdata("rango",$datosLogin->rango);
                redirect("perfil");
            } else{
                redirect("recuperacion");
            }
        }

    }


?>