<?php
    class Usuario_Model extends CI_Model {

        function __construct() { 
            parent::__construct(); 
            $this->load->database(); 
            $this->load->library("session");
            //$this->load->helper("url");
        } 
        public function getUsuarios(){
            return $this->db->get("usuario")->result();
        }
        public function confirmarToken($token){
            $id = $this->db->query("CALL spConfirmarCorreo(\"$token\")");
            $this->db->close();
        
        }
        public function loginCorrecto($usuario,$contrasena){
            $condicion = [
                "usuario" => $usuario
            ];
            $hash = $this->db->get_where("usuarios",$condicion)->row("contrasena");
            return password_verify($contrasena,$hash);
          
        }
        public function idUsuario($usuario){
            $condicion = [
                "usuario" => $usuario
            ];
            return $this->db->get_where("usuarios",$condicion)->row("id");
        }
        public function datosLogin($usuario){
            $condicion = [
                "usuario" => $usuario
            ];

            return $this->db->get_where("usuarios",$condicion)->row();  
        }

        public function getUsuario($usuario){
            $condicion = [
                "usuario" => $usuario,
            ];

            $existe = $this->db->get_where("usuarios",$condicion)->row("usuario");
            $this->db->close();
            return $existe;
        }

        public function getEmail($email){
            $condicion = [
                "email" => $email,
            ];

            $existe = $this->db->get_where("usuarios",$condicion)->row("email");
            $this->db->close();
            return $existe;
        }

        public function datosLoginId($id){
            $condicion = [
                "id" => $id
            ];
            return $this->db->get_where("usuarios",$condicion)->row();
            
        }
        public function login_necesario(){
            if(!isset($this->session->id)){
                redirect("acceso");
            };
        }
        public function sin_login(){
            if(isset($this->session->id)){
                redirect("home");
            }
        }
        public function modUser($datos){
            
            $this->db->close();
            redirect("Perfil_Controller");
        }
        // public function entradaPorVenta($id){
        //     $result = $this->db->query("CALL spEntradaPorEvento($id)");
        //     $this->db->close();
        //     $entradas = $result->result();

        //     echo "<tr>";
        //     echo "<th>Identificador</th>";
        //     echo "<th>Id venta</th>";
        //     echo "</tr>";
        //     foreach ($entradas as $aux) {
        //         echo "<tr class=\"entrada\">";
        //         echo "<td>Entrada</td>";
        //         echo "<td>". $aux->identificador ."</td>";
        //         echo "<td>".  $aux->idVenta ."</td>";
        //         echo "</tr>";
        //     }
        // }   
              
        public function elementoExiste($elemento,$dato){
            $condicion = [
                $elemento => $dato
            ];
            $existe = $this->db->get_where("usuarios",$condicion)->row($elemento);
            if(isset($existe)){
                return "1";
            } else {
                return "0";
            }

        }
        public function recuperacionCorrecto($condicion){
            $id = $this->db->get_where("usuarios",$condicion)->row("id");
  
            if(isset($id)){
                return $id;
            } else {
                return "0";
            } 
        }
        public function generarContrasenaTemporal($id){
            $codigo = md5(uniqid(rand()+$id, true));
            $this->db->query(" CALL `spNuevaContrasenaTemporal`($id, \"$codigo\")");
            return $codigo;
        }
        public function datosTemporal($codigo){
            $condicion = [
                "codigo" => $codigo
            ];
            return $this->db->get_where("recuperacion_contrasena",$condicion)->row();
        }
    }

?>