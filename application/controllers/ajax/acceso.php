  <?php
    class acceso extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library("session");
            $this->load->database();
            $this->load->helper("html");
            $this->load->helper("url");
        }

        public function index(){
          echo "vacio :D";
        }
        public function recuperacionExiste(){
            $elemento = $this->input->post("elemento");
            $dato = $this->input->post("dato");
            $this->load->model("Usuario_Model");
            $existe = $this->Usuario_Model->elementoExiste($elemento,$dato);
            echo $existe;
        }

    }
?>