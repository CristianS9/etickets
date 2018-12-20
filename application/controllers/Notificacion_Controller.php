<?php
    class Notificacion_Controller extends CI_Controller{
        public function __construct(){
           parent::__construct();
           $this->load->helper("html");
        }
        public function index(){
            echo "aaa";
        }
        public function notificacion(){
            $this->load->view("notificacion_view");
        }
        public function error(){

        }
        public function aviso(){

        }

    }

?>