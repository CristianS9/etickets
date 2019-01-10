<?php
class Evento_Model extends CI_Model{
    function __construct() { 
        parent::__construct(); 
    } 

    public function cargarProvincias(){
        $query = $this->db->get("provincias");
        $this->db->close();
        return $query->result();
    }

    public function insertar($datos){
        $linea= $this->db->query("CALL spInsertNewEvent('".$datos['nombre']."', '".$datos['descripcion']."', '".$datos['precio']."', '".$datos['fecha_inicio']."', '".$datos['fecha_fin']."', '".$datos['cantidad']."', '".$datos['provincia']."', '".$datos['sitio']."')")->row();
        $this->db->close();
        $lastId = $linea->IDMAX;
        return $lastId;
    }
    
    public function borrar($condicion){
        $this->db->delete("eventos",$condicion);
        $this->db->close();
    }

    public function modificar($condicion,$nuevo){
        // $tabla = la tabla en la que se hara el update
        // $condicion =  Array con los parametros a cumplir para el update
        // $nuevo = Array con los nuevos datos
        $this->db->set($nuevo);
        $this->db->where($condicion);
        $this->db->update('eventos',$nuevo);
        $this->db->close();
    }

}
?>