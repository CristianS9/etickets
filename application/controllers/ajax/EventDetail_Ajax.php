  <?php
class EventDetail_Ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
    }

    public function sendComment() {
        $this->load->model("Evento_Model");
        $comentario = $this->input->post("comentario");
        $eventId = $this->input->post("eventId");
        // El userId tiene que sacarse de la sesión, hay que crearla al hacer login
        $userId = $this->session->id;
        $this->Evento_Model->newComment($userId, $eventId, $comentario);
    }

    public function addItemToCart() {
        $this->load->model("EntradasEvento_Model");
        $entradaEventoId = $this->input->post("entradaId");
        $cantidad = $this->input->post("cantidad");
        $userId = $this->session->id;

        // Aquí se recoge el id del usuario de la sesión, de momento va a ser 1 (usuario Cristian)
        $this->EntradasEvento_Model->addToShoppingCart($userId, $entradaEventoId, $cantidad);
    }

    public function updateItemInCart() {
        $this->load->model("ShoppingCart_Model");
        $cantidad = $this->input->post("cantidad");
        $idEntrada = $this->input->post("idEntrada");
        $idEntradaEvento = $this->input->post("idEntradaEvento");
        //Aquí se recoge el id del usuario de la sesión, de momento va a ser 1
        $userId = $this->session->id;

        $returnedData = $this->ShoppingCart_Model->updateShoppingCart($userId, $idEntrada, $cantidad,$idEntradaEvento);
        echo $returnedData;
    }
    public function deleteFromCart() {
        $this->load->model("ShoppingCart_Model");
        $idEntrada = $this->input->post("entradaId");
        //Aquí se recoge el id del usuario de la sesión, de momento va a ser 1
        $userId = $this->session->id;

        $this->ShoppingCart_Model->deleteFromShoppingCart($userId, $idEntrada);
    }
    public function completeShoppingCart() {
        $this->load->model("ShoppingCart_Model");
        //Aquí se recoge el id del usuario de la sesión, de momento va a ser 1
        $userId = $this->session->id;

        $this->ShoppingCart_Model->completarCompra($userId);

    }
}
?>