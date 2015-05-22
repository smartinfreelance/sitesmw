<?php
class UsuarioCRUD extends CI_Model {

    function UsuarioCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getMyCourses($id_usuario)
	{
        $query = $this->db->query("select
										*
									from
										topics
									where 
										topics.id_usuario = '".$id_usuario."'
									and
										topics.estado = 0");
		return $query->result();
    }
	
	function registroLog($id,$accion){
		$query= $this->db->query("insert into 
									log_usuarios(
										id_usuario,
										modulo
									)
									values (
										".$id.",
										'".$accion."'
										)
									");
		return 0;
	}
	function getMisPuntos($id_usuario){
		$query = $this->db->query("select
										sum(puntuacion.puntos) as sum_puntos
									from
										puntuacion
									where 
										puntuacion.id_usuario = '".$id_usuario."'
									and
										puntuacion.estado = 0");
		return $query->result();

	}
}
?>