<?php
class ShoppingCart_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
    }

    public function index() {
        $this->load->view("shopping_cart");
    }
    
}


?>