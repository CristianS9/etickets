<?php
class Evento_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->database();
    }

    public function index() {
        $query = $this->db->get("eventos");
        $data["todo"] = $query->result();

        $this->load->helper("url");
        $this->load->view("evento_view", $data);
    }

    public function add_evento_view() {
        $this->validacion();
        $this->load->model("Evento_Model");
        $data['provincias'] = $this->Evento_Model->cargarProvincias();

        $this->load->helper("url");
        $this->load->view("evento_add_view", $data);
    }

    public function validacion() {
        if ($this->input->post("ev_nombre")) {
            //Primero inicializamos los mensajes de error
            //El primer campo es el tipo de error
            //El segundo es el mensaje de error
            $this->form_validation->set_message("is_unique", "{field} del evento ya existe");
            $this->form_validation->set_message("required", "Debes de introducir {field}");
            $this->form_validation->set_message("min_length", "Debes introducir minimo {param} caracteres en {field}");
            $this->form_validation->set_message("max_length", "Debes introducir maximo {param} caracteres en {field}");
            $this->form_validation->set_message("matches", "Las contraseñas no coinciden");
            $this->form_validation->set_message("regex_match", "La contraseña debe contener mayuscula,minuscula, un numero y un caracter especial");

            //Ahora inicializamos las reglas de validacion
            //El primer campo es el name del formulario
            //El segundo es el nombre visual que se le da en el mensage es decir el campo {field}
            $this->form_validation->set_rules('ev_nombre', 'Nombre', 'required|is_unique[eventos.nombre]|min_length[4]|max_length[40]');
            $this->form_validation->set_rules('ev_descripcion', 'descripcion', 'required|min_length[4]|max_length[200]');
            $this->form_validation->set_rules('ev_precio', 'precio', 'required|min_length[1]|max_length[10]');
            $this->form_validation->set_rules('ev_cantidad', 'cantidad', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('ev_fecha_inicio', 'fecha inicio', 'required');
            $this->form_validation->set_rules('ev_fecha_fin', 'fecha final', 'required');
            $this->form_validation->set_rules('ev_provincia', 'provincia', 'required');
            $this->form_validation->set_rules('ev_sitio', 'sitio', 'required|min_length[3]|max_length[50]');

            if ($this->form_validation->run() == false) {

            } else {
                $this->load->model("Evento_Model");
                $datos = [
                    "nombre" => $this->input->post("ev_nombre"),
                    "descripcion" => $this->input->post("ev_descripcion"),
                    "precio" => $this->input->post("ev_precio"),
                    "fecha_inicio" => $this->input->post("ev_fecha_inicio"),
                    "fecha_fin" => $this->input->post("ev_fecha_fin"),
                    "cantidad" => $this->input->post("ev_cantidad"),
                    "provincia" => $this->input->post("ev_provincia"),
                    "sitio" => $this->input->post("ev_sitio"),
                ];

                $lastId = $this->Evento_Model->insertar($datos);
                $this->subirImagen($lastId);

            }

        }
    }

    public function subirImagen($fileName) {
        $config['upload_path'] = './fotos/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $url = "fotos/" . $fileName . ".jpg";
        $exists = file_exists($url);
        //Si la imagen existe se borra para que no se escriba mal el nombre
        if (file_exists($url)) {
            unlink($url);
        }

        $config['file_name'] = $fileName . ".jpg";
        $config['max_size'] = 4096;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        //Si no ha subido la imagen o ha habido algun error entra
        if (!$this->upload->do_upload('ev_imagen')) {
            $this->form_validation->setError('ev_imagen', $this->upload->display_errors());

            $this->load->model("Evento_Model");
            $condicion = [
                "id" => $fileName
            ];
            $this->Evento_Model->borrar($condicion);

        } else {
            redirect("Evento_Controller");
        }
    }

    public function del_evento() {
        $this->load->model("Evento_Model");
        $id = $this->uri->segment("3");

        $condicion = [
            "id" => $id,
        ];
        $this->Evento_Model->borrar($condicion);
        $this->load->helper("file");

        //Este metodo borra la imagen con la id a borrar
        unlink("fotos/$id.jpg");

        redirect("Evento_Controller");

    }
    public function mod_evento_view() {
        $this->load->model("Evento_Model");
        $id = $this->uri->segment("3");
        $query = $this->db->query("CALL spGetEventoPorId('$id')");
        $data['eventos'] = $query->result();
        $this->db->close();
        $data['provincias'] = $this->Evento_Model->cargarProvincias();

        $this->load->view("evento_update_view", $data);
    }
    public function mod_evento() {
        $this->load->model("Evento_Model");

        $condicion = [
            "id" => $this->input->post("id"),
        ];

        $nuevo = [
            "nombre" => $this->input->post("nombre"),
            "descripcion" => $this->input->post("descripcion"),
            "fecha_inicio" => $this->input->post("fecha_inicio"),
            "fecha_fin" => $this->input->post("fecha_fin"),
            "idProvincia" => $this->input->post("provincia"),
            "sitio" => $this->input->post("sitio"),
        ];

        // print_r($condicion);
        // print_r($nuevo);
        $this->Evento_Model->modificarEvento($condicion, $nuevo);
        redirect("Evento_Controller");

    }
}
