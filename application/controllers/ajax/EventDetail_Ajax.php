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
        $userId = 1;
        $this->Evento_Model->newComment($userId, $eventId, $comentario);
    }

    public function addItemToCart() {
        $this->load->model("EntradasEvento_Model");
        $entradaEventoId = $this->input->post("entradaId");
        $cantidad = $this->input->post("cantidad");
        $userId = 1;
        // Aquí se recoge el id del usuario de la sesión, de momento va a ser 1 (usuario Cristian)
        $this->EntradasEvento_Model->addToShoppingCart($userId, $entradaEventoId, $cantidad);
    }
}
?>