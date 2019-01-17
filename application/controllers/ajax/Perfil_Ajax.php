  <?php
class Perfil_ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library("session");
        $this->load->database();
    }

    public function modPerfil(){
        $this->load->model('Usuario_Model');

        $dato = $this->input->post("dato");
        $columna = $this->input->post("columna");

        $data = array(
        $columna => $dato
        );

        echo "dato".$dato;
        echo "columna".$columna;
        print_r($data);

        $id = $this->session->id;
        // $this->db->where('id', $id);
        // $this->db->update('usuarios', $data);

        // Los datos que se van a escribir
        $this->db->set($data);
        // La clausula where, puede ser un array con las condiciones
        $this->db->where("id",$id);
        //La tabla donde se establecera y denuevo los datos
        $this->db->update("usuarios",$data);

    }
}
?>