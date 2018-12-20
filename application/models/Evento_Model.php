<?php
class Evento_Model extends CI_Model{
    function __construct() { 
        parent::__construct(); 
    } 

    public function cargarProvincias(){
        $query = $this->db->get("provincias");
        return $query->result();
    }

    public function insertar($datos){
        $this->db->query("CALL spInsertNewEvent('".$datos['nombre']."', '".$datos['descripcion']."', '".$datos['precio']."', '".$datos['fecha_inicio']."', '".$datos['fecha_fin']."', '".$datos['cantidad']."', '".$datos['provincia']."', '".$datos['sitio']."')");
    }
    
    public function borrar($condicion){
        $this->db->delete("eventos",$condicion);
    }

    public function modificar($condicion,$nuevo){
        // $tabla = la tabla en la que se hara el update
        // $condicion =  Array con los parametros a cumplir para el update
        // $nuevo = Array con los nuevos datos
        $this->db->set($nuevo);
        $this->db->where($condicion);
        $this->db->update('eventos',$nuevo);
        
    }
}
?>