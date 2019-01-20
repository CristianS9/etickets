<?php
    class Correo extends CI_Model{
        public function __construct(){
            parent::__construct();
            $config = [];
            $config['protocol'] = 'smtp';
            $config['smtp_host']='smtp.live.com';
            $config['smtp_user'] = 'etickets_reto@outlook.es';
            $config['smtp_pass'] = 'Prueba123';
            $config['smtp_port'] = 587;
            $config['mailtype'] = 'html';
            $config["smtp_crypto"] = "tls";
            
            
            $this->load->library("email",$config);
      
            //////////////////////////////////
            /// DIOS SE QUEDA AQUI//////////
            //////////////////////////////////
            $this->email->set_crlf("\r\n");
            $this->email->set_newline("\r\n");
            //////////////////////////////////
            /// DIOS SE QUEDA AQUI//////////
            //////////////////////////////////
            
        }   
        public function registro($usuario,$email,$token){
            $this->email->from("etickets_reto@outlook.es","Etickets");
            $this->email->to($email);
            $this->email->subject("Bienvenido a la comunidad de Etickets!");
            $data["usuario"] =$usuario;
            $data["token"] = $token;
            $mensaje = $this->load->view("email/registro",$data,true);
            $this->email->message($mensaje);

            $this->email->send();
   
        
        }

    }


?>