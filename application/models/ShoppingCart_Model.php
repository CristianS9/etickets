<?php
class ShoppingCart_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getShoppingCart($userId) {
        $query = $this->db->query("CALL getUserCart(" . $userId . ")");
        $this->db->close();
        return $query->result();

    }

    public function updateShoppingCart($userId, $entradaEventoId, $cantidad) {
        $query = $this->db->query("CALL spUpdateTicketInUserCart($userId,$entradaEventoId,$cantidad)");
        $this->db->close();
    }
    public function deleteFromShoppingCart($userId, $entradaEventoId) {
        $query = $this->db->query("CALL spDeleteFromShoppingCart($userId,$entradaEventoId)");
        $this->db->close();
    }
    public function completarCompra($userId){

        // Genera las ventas, pero no genera los identificadores.
        $query = $this->db->query("CALL spGenerarVenta($userId)");

        // Generar los identificadores.
        

        $this->db->close();
    }
}
