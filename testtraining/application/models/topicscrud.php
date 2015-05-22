<?php
class TopicsCRUD extends CI_Model {

    function TopicsCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function add_topic($nombre, $descripcion,$id_usuario)
	{
		$query= $this->db->query("insert into 
									topics(
										topic,
										descripcion,
										id_usuario
									)
									values (
										'".$nombre."',
										'".$descripcion."',
										".$id_usuario."
										)
									");
		return $this->db->insert_id();
	}

	function add_pregunta($id_topic, $pregunta){
		$query= $this->db->query("insert into 
									preguntas(
										id_topic,
										pregunta
									)
									values (
										".$id_topic.",
										'".$pregunta."'
										)
									");
		return $this->db->insert_id();
	}

	function add_respuesta($id_pregunta, $respuesta,$correcta){
		$query= $this->db->query("insert into 
									respuestas(
										id_pregunta,
										respuesta,
										correcta
									)
									values (
										".$id_pregunta.",
										'".$respuesta."',
										".$correcta."
										)
									");
		return $this->db->insert_id();
	}

	function getAllTopics(){
		$query = $this->db->query("select
										topics.id as id,
										topics.topic as topic,
										topics.descripcion as descripcion,
										topics.valoracion as valoracion,
										topics.fecha_alta as fecha_alta,
										usuarios.id as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario
									from
										topics
									inner join
										usuarios
									on
										usuarios.id = topics.id_usuario
									where 
										topics.estado = 0");
		return $query->result();

	}

	function get_attributos($id_topic){
		$query = $this->db->query("select
										topics.topic as topic,
										topics.descripcion as descripcion
									from
										topics
									where
										topics.id = ".$id_topic."
									and 
										topics.estado = 0");
		return $query->result();

	}


	function addTry($id_topic,$id_usuario,$id_modo){
		$query= $this->db->query("insert into 
									puntuacion(
										id_topic,
										id_usuario,
										id_modo
									)
									values (
										".$id_topic.",
										".$id_usuario.",
										".$id_modo."
										)
									");
		return $this->db->insert_id();
	}

	function updatePtsParcial($pts_parcial,$id_try){
		$query = $this->db->query("
									update
										puntuacion
									set
										puntuacion.puntos = ".$pts_parcial."
									,
										puntuacion.fecha_fin = current_timestamp()
									where
										puntuacion.id = ".$id_try."

									");
		return 0;
	}

	function getCantTries($id_topic,$id_usuario,$id_modo,$fecha){

		$query = $this->db->query("select
										*
									from
										puntuacion
									where 
										puntuacion.id_topic =  ".$id_topic."
									and
										puntuacion.id_usuario =  ".$id_usuario."
									and
										puntuacion.id_modo = ".$id_modo."
									and
										puntuacion.estado = 0
									and	
										DATE(puntuacion.fecha_alta) = CURRENT_DATE()
									");
		return $query->num_rows();


	}

	function getCalificacionXTopic($id_topic,$id_usuario){
		$query = $this->db->query("select
										*
									from
										calificaciones
									where 
										calificaciones.id_usuario = ".$id_usuario."
									and
										calificaciones.id_topic = ".$id_topic."
									and
										calificaciones.estado = 0");
		return $query->result();
	}

	function setCalificacionXTopic($id_topic,$id_usuario,$calificacion){
		$query= $this->db->query("insert into 
									calificaciones(
										id_topic,
										id_usuario,
										calificacion
									)
									values (
										".$id_topic.",
										".$id_usuario.",
										".$calificacion."
										)
									");
		return $this->db->insert_id();
	}

	function getDataCalif($id_topic){
		$query = $this->db->query("select
									count(*) as c,
									sum(calificacion) as sum_c
								from
									calificaciones
								where
									calificaciones.estado = 0
								and
									calificaciones.id_topic = ".$id_topic."");
		return $query->result();
	}


	function updateCalificacion($id_topic,$calificacion){
		$query = $this->db->query("
									update
										topics
									set
										topics.valoracion = ".$calificacion."
									where
										topics.id = ".$id_topic."

									");
		return 0;
	}

	function getRankingPts($id_topic){
		$query = $this->db->query("select
									usuarios.nombre as nombre_usuario,
									usuarios.apellido as apellido_usuario,
									puntuacion.id_usuario as id_usuario,
									sum(puntuacion.puntos) as sum_puntos
								from
									puntuacion
								inner join
									usuarios
								on 
									usuarios.id = puntuacion.id_usuario
								where
									puntuacion.estado = 0
								and
									puntuacion.id_topic = ".$id_topic."
								group by puntuacion.id_usuario
								order by sum_puntos desc");
		return $query->result();

	}

	function getRankingAvg($id_topic){
		$query = $this->db->query("select
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										puntuacion.id_usuario as id_usuario,
										avg(puntuacion.puntos) as avg_puntos
									from
										puntuacion
									inner join
										usuarios
									on 
										usuarios.id = puntuacion.id_usuario
									where
										puntuacion.estado = 0
									and
										puntuacion.id_topic = ".$id_topic."
									group by puntuacion.id_usuario
									order by avg_puntos desc");
		return $query->result();

	}

	function getRankingPtsHoy($id_topic,$date){
		$query = $this->db->query("select
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										puntuacion.id_usuario as id_usuario,
										sum(puntuacion.puntos) as sum_puntos
									from
										puntuacion
									inner join
										usuarios
									on 
										usuarios.id = puntuacion.id_usuario
									where
										puntuacion.estado = 0
									and
										puntuacion.id_topic = ".$id_topic."
									and
										DATE(puntuacion.fecha_alta) = CURRENT_DATE()
									group by puntuacion.id_usuario
									order by sum_puntos desc");
		return $query->result();

	}

	function getRankingAvgHoy($id_topic,$date){
		$query = $this->db->query("select
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										puntuacion.id_usuario as id_usuario,
										avg(puntuacion.puntos) as avg_puntos
									from
										puntuacion
									inner join
										usuarios
									on 
										usuarios.id = puntuacion.id_usuario
									where
										puntuacion.estado = 0
									and
										puntuacion.id_topic = ".$id_topic."
									and
										DATE(puntuacion.fecha_alta) = CURRENT_DATE()
									group by puntuacion.id_usuario
									order by avg_puntos desc");
		return $query->result();

	}

	function getMisScoresHoy($id_topic,$id_modo,$id_usuario){
		$query = $this->db->query("select
									usuarios.nombre as nombre_usuario,
									usuarios.apellido as apellido_usuario,
									puntuacion.id_usuario as id_usuario,
									puntuacion.puntos as puntos
								from
									puntuacion
								inner join
									usuarios
								on 
									usuarios.id = puntuacion.id_usuario
								where
									puntuacion.estado = 0
								and
									puntuacion.id_topic = ".$id_topic."
								and
									puntuacion.id_modo = ".$id_modo."
								and
									puntuacion.id_usuario = ".$id_usuario."
								and
									DATE(puntuacion.fecha_alta) = CURRENT_DATE()
								order by puntuacion.puntos desc
								");
		return $query->result();
	}
}
?>