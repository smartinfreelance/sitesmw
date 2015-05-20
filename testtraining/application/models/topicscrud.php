<?php
class TopicsCRUD extends CI_Model {

    function TopicsCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function add_topic($nombre, $descripcion)
	{
		$query= $this->db->query("insert into 
									topics(
										topic,
										descripcion
									)
									values (
										'".$nombre."',
										'".$descripcion."'
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
										DATE(puntuacion.fecha_alta) = '".$fecha."'
									");
		return $query->num_rows();


	}
}
?>