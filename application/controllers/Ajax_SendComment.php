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
        $comentario = $this->input->get("comentario");
        $eventId = $this->input->get("eventId");
        $userId = $this->input->get("userId");
        $this->Evento_Model->newComment($userId,$eventId,$comentario);
    }
}
?>