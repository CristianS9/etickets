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
    public function completarCompra($userId) {

        // Genera las ventas, pero no genera los identificadores.
        $query = $this->db->query("CALL spGenerarVenta($userId)");
        $this->db->close();

        // Generar los identificadores.
        $query = $this->db->query("CALL spGetIdentificadoresNull($userId)");
        $idFilasEntradasNull = $query->result();
        $this->db->close();

        $nuevasIds = [];

        // Genera un nuevo identificador único para cada entrada.
        foreach ($idFilasEntradasNull as $id) {
            $nuevasIds[$id->id] = $this->generarIdentificador(3) . $id->id;
        }

        // Hace la query por cada uno que haya
        foreach ($nuevasIds as $id => $valor) {
            $consulta = "UPDATE entradas SET ";
            $consulta .= "entradas.identificador = '" . $valor . "'";
            $consulta .= " WHERE entradas.id = " . $id;
            $this->db->query("$consulta");
            $this->db->close();

        }
    }

    public function generarIdentificador($length) {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); 

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
        return $token;
    }

}
