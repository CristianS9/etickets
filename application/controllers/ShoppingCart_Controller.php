<?php
class ShoppingCart_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
    }

    public function index() {
        $this->load->model("ShoppingCart_Model");
        // Coge la id del usuario desde la sesión
        $userId = 1;
        $data['carrito'] = $this->ShoppingCart_Model->getShoppingCart($userId);
        $this->load->view("shopping_cart", $data);

    }

    public function endCart() {
        $this->load->model("ShoppingCart_Model");
        // Coge la id del usuario desde la sesión
        $userId = 1;
        $data['carrito'] = $this->ShoppingCart_Model->getShoppingCart($userId);
        $this->load->view("shopping_cart_end", $data);
    }
}
