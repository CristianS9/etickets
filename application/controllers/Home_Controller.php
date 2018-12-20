  <?php
class Home_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function index() {
        // $query = $this->db->query("CALL spGetAllEventsForIndex()");
        // $data["todo"] = $query->result();

        $this->load->model("Home_Model");
        
        $data['datos'] = $this->Home_Model->getHomeEvents();
        
        $this->load->helper("url");
        $this->load->view("home", $data);
    }
}

?>