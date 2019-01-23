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
            $this->load->database();
      
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
        public function compra($idCompra){
            $result = $this->db->query("CALL spCorreoPorVenta($idCompra)");
            $email = $result->row("correo");
            $this->db->close();

            $this->email->from("etickets_reto@outlook.es","Etickets");
            $this->email->to("$email");
            $this->email->subject("Gracias por tu compra!");

            $data["idCompra"] = $idCompra;

            // $this->load->view("email/compra",$data);
            $mensaje = $this->load->view("email/compra",$data,true);
            $this->email->message($mensaje);

            $this->email->send();
        }

    }


?>