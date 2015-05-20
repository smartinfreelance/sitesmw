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

    function getAllPreguntasByTopic($id_topic){
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
									and
										preguntas.id_topic = ".$id_topic."
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

	function getAllRespuestas($filtro)
	{
        $query = $this->db->query("select
										respuestas.id as id,
										respuestas.respuesta as respuesta,
										respuestas.correcta as correcta,
										respuestas.id_pregunta as id_pregunta
									from
										respuestas
									where 
										respuestas.estado = 0
									".$filtro."
									ORDER BY RAND()
									");
		return $query->result();
    }

    function getPreguntasByTopic($id_topic){
    	$query = $this->db->query("select
										preguntas.id as id,
										preguntas.pregunta as pregunta
									from
										preguntas
									where 
										preguntas.estado = 0
									and
										preguntas.id_topic = ".$id_topic."
									ORDER BY RAND()
									");
		return $query->result();

    }

    function getRespuestasX52Pr($filtro){
    	$query = $this->db->query("select
										respuestas.id as id,
										respuestas.id_pregunta as id_pregunta,
										respuestas.respuesta as respuesta
									from
										respuestas
									where 
										respuestas.estado = 0
									".$filtro."
									ORDER BY RAND()
									");
		return $query->result();

    }

    function getPregResCorr($id_pregunta, $id_respuesta){
    	$query= $this->db->query("select
									preguntas.id as id_pregunta,
									preguntas.pregunta as pregunta,
									respuestas.id as id_respuesta,
									respuestas.respuesta as respuesta,
									respuestas.correcta as correcta
								from
									preguntas
								inner join 
									respuestas
								on
									respuestas.id_pregunta = preguntas.id
								where
									respuestas.correcta = 1
								and
									respuestas.id = ".$id_respuesta."
								and
									preguntas.id = ".$id_pregunta."
    							");
		return $query->result();
    }

    function getPregResIncorr($id_pregunta, $id_respuesta){
    	$query= $this->db->query("select
									preguntas.id as id_pregunta,
									preguntas.pregunta as pregunta,
									respuestas.id as id_respuesta,
									respuestas.respuesta as respuesta,
									respuestas.correcta as correcta
								from
									preguntas
								inner join 
									respuestas
								on
									respuestas.id_pregunta = preguntas.id
								where
									preguntas.id = ".$id_pregunta."
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

	function getCantPreguntasByTopic($id_topic){
		$query = $this->db->query("select
										*
									from
										preguntas
									where 
										preguntas.estado = 0
									and
										preguntas.id_topic = ".$id_topic."
									");


		return $query->num_rows();
	}

	function get_attributos($id_topic){
		$query = $this->db->query("select
										*
									from
										preguntas
									where 
										preguntas.estado = 0
									and
										preguntas.id_topic = ".$id_topic."
									");
		return $query->result();
	}
}
?>