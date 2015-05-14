<?php
class PreguntasCRUD extends CI_Model {

    function PreguntasCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getAllPreguntas()
	{
        $query = $this->db->query("select
										preguntas.id as id,
										preguntas.pregunta as pregunta,
										respuestas.respuesta as respuesta,
										respuestas.correcta as correcta
									from
										preguntas
									inner join respuestas on respuestas.id_pregunta = preguntas.id
									where 
										preguntas.estado = 0
									and
										respuestas.estado = 0
									");
		return $query->result();
    }

	function getAllRespuestas()
	{
        $query = $this->db->query("select
										respuestas.id as id,
										respuestas.respuesta as respuesta,
										respuestas.correcta as correcta
									from
										respuestas
									where 
										respuestas.estado = 0
									");
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
}
?>