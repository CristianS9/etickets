  <?php
class Ajax_SendComment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('html');
    }

    public function sendComment(){
        $this->load->model("Evento_Model");
        $comentario = $this->input->post("comentario");
        $eventId = $this->input->post("eventId");
        // El userId tiene que sacarse de la sesión, hay que crearla al hacer login
        $userId = 1;
        $this->Evento_Model->newComment($userId,$eventId,$comentario);
    }
}
?>