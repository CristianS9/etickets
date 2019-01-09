<?php
class EntradasEvento_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addToShoppingCart($userId, $entradaEventoId, $cantidad) {
        $exists = $this->db->query("CALL spCheckItemInCart('$entradaEventoId','$userId')");
        $ret = $exists->row();
        $this->db->close();

        // Comprueba que ese artículo ya se encuentra en el carrito de la compra. Si existe, suma la cantidad
        if ($entradaEventoId == $ret->idEntradaEvento) {
            $cantidadActualizada = $cantidad + $ret->cantidad;
            $exists = $this->db->query("CALL spSumItemShoppingCart('$userId','$entradaEventoId','$cantidadActualizada')");
        } else {
            $this->db->query("CALL spInsertIntoShoppingCart('$userId','$entradaEventoId','$cantidad')");
        }
        $this->db->close();

    }
}
