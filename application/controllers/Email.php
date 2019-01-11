<?php
    class email extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper("url");
        }
        public function index(){
            $this->load->library("email");
            $config = array();
            $config["mailtype"] = "html";
            $config['protocol'] = 'smtp';
            $config['smtp_host']='smtp.live.com';
            $config['smtp_user'] = 'etickets_reto@outlook.es';
            $config['smtp_pass'] = 'Prueba123';
            $config['smtp_port'] = 587;
            $config['smtp_crypto'] = 'tls';
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf( "\r\n" );





            $this->email->from("etickets_reto@outlook.es","Cristian");
         //   $this->email->to("anderlarri14@gmail.com");
            $this->email->to("cristiansiroca@gmail.com");
            $this->email->subject("!Importante!!!");
            $data["prueba"] = "aaa";
            $mensaje = $this->load->view("email/registro",$data,TRUE);
            $this->email->message($mensaje);

            $this->email->send();
            //redirect("email");
        
        }
    }


?>