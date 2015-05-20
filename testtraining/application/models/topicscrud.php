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
}
?>