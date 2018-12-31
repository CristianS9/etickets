<?php
    class Usuario_Model extends CI_Model {

        function __construct() { 
            parent::__construct(); 
            $this->load->database(); 
            $this->load->library("session");
            //$this->load->helper("url");
        } 
        public function getUsuarios(){
            return $this->db->get("usuario")->result();
        }
        public function usuarioExiste($usuario){
            $condicion = ["usuario"=>$usuario];
            $query = $this->db->get_where("usuarios",$condicion);
            if($query->row("usuario")){
                redirect("/notificacion/error/1");
            };
        }
        public function contrasenaIgual($contrasena,$repetida){
            if($contrasena!=$repetida){
                redirect("/notificacion/error/2");
            }
        }
        public function emailExiste($email){
            $condicion = ["email"=>$email];
            $query = $this->db->get_where("usuarios",$condicion);

            if($query->row("email")){
                redirect("/notificacion/error/3");
            }
        }
        public function minimos_registro($usuario,$contrasena,$nombre,$apellidos,$email,$telefono){
            $this->minimo_usuario($usuario);
            $this->minimo_contrasena($contrasena);
            $this->minimo_nombre($nombre);
            $this->minimo_apellidos($apellidos); 
            $this->minimo_email($email);
            $this->minimo_telefono($telefono);
        }
        public function minimo_usuario($usuario){
            $usuario = trim($usuario);
            $len =strlen($usuario);
            if($len<5){
                redirect("/notificacion/error/4");
            } else if ($len>50){
                redirect("/notificacion/error/5");
            }

            $espacios = "/\s/";
            if(preg_match($espacios,$usuario)){
                redirect("/notificacion/error/12");
            }
        } 
        public function minimo_contrasena($contrasena){
            $contrasena = trim($contrasena);
            $len = strlen($contrasena);
            if($len<6){
                redirect("/notificacion/error/6");
            } else if($len>50){
                redirect("notificacion/error/7");
            }

            $mayuscula = "/[A-Z]+/";
            if(!preg_match($mayuscula,$contrasena)){
                redirect("/notificacion/error/8");
            };
            $numero = "/\d+/";
            if(!preg_match($numero,$contrasena)){
                redirect("/notificacion/error/9");
            }
            $minuscula = "/[a-z]+/";
            if(!preg_match($minuscula,$contrasena)){
                redirect("/notificacion/error/10");
            }            
            $espacios = "/\s/";
            if(preg_match($espacios,$contrasena)){
                redirect("/notificacion/error/11");
            }
        } 
        public function minimo_nombre($nombre){
            $nombre = trim($nombre);
            $len =strlen($nombre);
            if($len<3){
                redirect("/notificacion/error/13");
            } else if ($len>50){
                redirect("/notificacion/error/14");
            }
        }
        public function minimo_apellidos($apellidos){
            $apellidos = trim($apellidos);
            $len = strlen($apellidos);
            if($len<4){
                redirect("/notificacion/error/15");
            } else if($len>50){
                redirect("/notificacion/error/16");
            }  
        }
        public function minimo_email($email){
            $email = trim($email);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                redirect("/notificacion/error/17");
            }
        }
        public function minimo_telefono($telefono){
            $telefono = trim($telefono);
            $len = strlen($telefono);
            if($len!=9){
                redirect("/notificacion/error/18");
            }
            $numeros = "/\D+/";
            if(preg_match($numeros,$telefono)){
                redirect("/notificacion/error/19");
            }
        }
        public function registrar($usuario,$contrasena,$nombre,$apellidos,$email,$telefono){
            $datos = [
                "usuario" => $usuario,
                "contrasena" => $contrasena,
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "email" => $email,
                "telefono" => $telefono,
            ];
            $this->db->insert("usuarios",$datos);
        }
        public function login_correcto($usuario,$contrasena){
            $usuario = trim($usuario);
            $contrasena = trim($contrasena);

            $condicion = [
                "usuario" => $usuario
                ,"contrasena" => $contrasena
            ];
            $query = $this->db->get_where("usuarios",$condicion);

            if(!$query->row("usuario")){
                redirect("/notificacion/error/20");
            } else {
                $datos = [
                    "id" => $query->row("id")
                    ,"rango" => $query->row("rango")
                    ,"usuario" => $query->row("usuario")
                ]; 
                $this->session->set_userdata($datos);
            }

        }
    }

?>