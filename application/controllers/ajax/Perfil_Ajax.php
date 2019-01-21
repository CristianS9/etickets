  <?php
class Perfil_ajax extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library("session");
        $this->load->model("Usuario_Model");
        $this->load->database();
    }

    public function modPerfil(){
        $this->load->model('Usuario_Model');

        $dato = $this->input->post("dato");
        $columna = $this->input->post("columna");

        if ("contrasena" == $columna) {    
            $hash = password_hash($dato,PASSWORD_BCRYPT);

            $data = array(
                $columna => $hash
            );        

            $id = $this->session->id;
            // Los datos que se van a escribir
            $this->db->set($data);
            // La clausula where, puede ser un array con las condiciones
            $this->db->where("id",$id);
            //La tabla donde se establecera y denuevo los datos
            $this->db->update("usuarios",$data);

        } else{
            // if ($columna == "usuario") {
            //     $resultado = $this->db->query("SELECT * FROM usuarios WHERE usuario = '$dato'");
                
            // }
            

            $data = array(
            $columna => $dato
            );

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

    public function checkUser(){
        $username = $this->input->post("username");
        
        $existe = $this->Usuario_Model->datosLogin($username);

        if (isset($existe->usuario)) {
            echo "true";
        } else {
            echo "false";
        }
    
    }
}
?>