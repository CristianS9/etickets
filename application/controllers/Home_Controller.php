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
        $dateValue = get_cookie("lastLogin");
        if($dateValue == null){
            $dateValue = "Es la primera vez que entras a nuestra página web!";
        }
        $this->load->view("home", $data);
    }
}

?>