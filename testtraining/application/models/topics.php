<?php
class TopicCRUD extends CI_Model {

    function TopicCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function add_topic($nombre, $descripcion)
	{
        $query = $this->db->query("select
										*
									from
										topics
									where 
										topics.id_Topic = '".$id_Topic."'
									and
										topics.estado = 0");
		return $query->result();
    }
	
	function regisadd_topictroLog($nombre, $descripcion)
	{
		$query= $this->db->query("insert into 
									topics(
										nombre,
										descripcion
									)
									values (
										".$id.",
										'".$accion."'
										)
									");
		return $this->db->insert_id();
	}
}
?>