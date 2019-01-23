  <?php
class Perfil extends CI_Controller {
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
    public function modificarDato(){
        $elemento = $this->input->post("elemento");
        $dato = $this->input->post("dato");
        if($elemento=="contrasena"){
            $dato = password_hash($dato,PASSWORD_BCRYPT);
        }

        $datos = [
            $elemento => $dato
        ];
        $id = $this->session->id;
        
         // Los datos que se van a escribir
        $this->db->set($datos);
        // La clausula where, puede ser un array con las condiciones
        $this->db->where("id",$id);
        //La tabla donde se establecera y denuevo los datos
        $this->db->update("usuarios",$datos);
        
    }
    public function usuarioExiste(){
        $usuario = $this->input->post("usuario");
        $existe = $this->Usuario_Model->getUsuario($usuario);

        if ("" == $existe) {
            echo "false";
        } else {
            echo "true";
        }
    
    }
    public function emailExiste(){
        $email = $this->input->post("email");
        $existe = $this->Usuario_Model->getEmail($email);
        if("" == $existe){
            echo "false";
        }else {
            echo "true";
        }
    }
}
?>