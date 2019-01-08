  <?php
class Ajax_AddToCart extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('html');
    }

    public function addItemToCart(){
        $this->load->model("EntradasEvento_Model");
        $entradaEventoId = $this->input->post("entradaId");
        $userId = 1;
        // Aquí se recoge el id del usuario de la sesión, de momento va a ser 1 (usuario Cristian)
        $this->EntradasEvento_Model->addToShoppingCart($userId,$entradaEventoId);
    }
}
?>