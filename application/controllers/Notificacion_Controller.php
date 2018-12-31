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
                ,4 => "El nombre de usuario debe de contener mas de 4 caracteres"
                ,5 => "El nombre de usuario debe de contener como maximo 50 caracteres"
                ,6 => "La contraseña debe conteneter mas de 5 caracteres"
                ,7 => "La contraseña debe de contener como maximo 50 caracteres"
                ,8 => "La contraseña debe contener como minimo 1 letra mayuscula"
                ,9 => "La contraseña debe contener como minimo 1 numero"
                ,10 => "La contraseña debe de contener como minimo 1 letra minuscula"
                ,11 => "La contraseña no puede contener espacios en blanco"
                ,12 => "El nombre de usuario no puede contener espacios en blanco"
                ,13 => "El nombre tiene que tener mas de 3 letras"
                ,14 => "El nombre no puede contener mas de 50 caracteres"
                ,15 => "Los apellidos deben de contener mas de 4 caracteres"
                ,16 => "Los apellidos no pueden superar los 50 caracteres"
                ,17 => "El correo electronico intruducido no es valido"
                ,18 => "El numero debe contener 9 numeros exactos"
                ,19 => "El numero de telefono debe solo puede contener numeros"

            ];
            $mensaje["aviso"] =[];


            $data["tipo"] = ucfirst($tipo);
            $data["mensaje"] = $mensaje[$tipo][$num];
            $this->load->view("notificacion_view",$data);   
        }
        
        

    }

?>