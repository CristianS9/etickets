  <?php
class Home_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->helper('cookie');
    }

    public function index() {
        $this->load->model("Home_Model");
        $data['datos'] = $this->Home_Model->getHomeEvents();
        require_once APPPATH . 'third_party/jQueryLiveSearch/core/Handler.php';
        require_once APPPATH . 'third_party/jQueryLiveSearch/core/Config.php';

        if (isset($this->session->id)) {

            
                $cookie = array(
                    'name' => 'login',
                    'value' => date("Y-m-d h:i:sa"),
                    'expire' => '3700',
                );
                $this->input->set_cookie($cookie);

            

        }

        $this->load->view("home", $data);
    }
}

?>