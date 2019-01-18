<?php
    class email extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper("url");
        }
        public function index(){
            $data["token"] = "Bienvenido a esta maravillosa comunidad!";
            $mensaje = $this->load->view("email/test",$data,TRUE);
            
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


            $this->email->from("etickets_reto@outlook.es","Cristian");
            $this->email->to("cristiansiroca@gmail.com");
         //   $this->email->to("anderlarri14@gmail.com");
            $this->email->subject("!Importasdante!!! AAAAAAAA");
            $this->email->message($mensaje);

            $this->email->send();
            //redirect("email");
        
        }
    }


?>