<?php
class ShoppingCart_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');

    }

    public function index() {
        if(!isset($this->session->usuario)){
            redirect('/login');

        }else{
        $this->load->model("ShoppingCart_Model");
        $userId = $this->session->id;

        $data['carrito'] = $this->ShoppingCart_Model->getShoppingCart($userId);
        $this->load->view("shopping_cart", $data);
}
    }

    public function endCart() {
        $this->load->model("ShoppingCart_Model");
   
        $userId = $this->session->id;

        $data['carrito'] = $this->ShoppingCart_Model->getShoppingCart($userId);
        $this->load->view("shopping_cart_end", $data);
    }
}
