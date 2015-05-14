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

    function getPregunta($filtro)
	{
        $query = $this->db->query("select
										preguntas.id as id,
										preguntas.pregunta as pregunta
									from
										preguntas
									where 
										preguntas.estado = 0
									".$filtro."
									ORDER BY RAND()
									limit 1

									");
		return $query->result();
    }

    function getRespuestasById($id_pregunta)
	{
        $query = $this->db->query("select
										respuestas.id as id,
										respuestas.respuesta as respuesta,
										respuestas.correcta as correcta
									from
										respuestas
									where 
										respuestas.estado = 0
									and
										respuestas.id_pregunta = ".$id_pregunta."
									and
										respuestas.estado = 0
									ORDER BY RAND()
									");
		return $query->result();
    }

    function comprobarRespuesta($id_pregunta, $id_respuesta){
    	$query = $this->db->query("select
										*
									from
										respuestas
									inner join preguntas on respuestas.id_pregunta = preguntas.id
									where 
										preguntas.estado = 0
									and
										respuestas.estado = 0
									and
										preguntas.id = ".$id_pregunta."
									and
										respuestas.id = ".$id_respuesta."
									and
										respuestas.correcta = 1
									");
		return $query->num_rows();

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