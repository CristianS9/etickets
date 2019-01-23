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
        public function recuperacionExiste($elemento,$dato){
         
            echo "$elemento---$dato";
        }
    }
?>