<?php
class TComentariosCRUD extends CI_Model {

    function TComentariosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTComentarios()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							comentarios_tasks.id as id, 
	        							comentarios_tasks.id_task as id_task,
	        							comentarios_tasks.comentario as comentario
        							from 
        								comentarios_tasks 
									where 
										comentarios_tasks.estado = 0
									order by
										comentarios_tasks.id");
		return $query->result();
    }
//
    function addTComentario($id_task,$,$nombre){
    	$query= $this->db->query("insert into 
									comentarios_tasks
    									(id_task,id_usuario,comentario)
									values (
    									(".$id_task.",".$id_usuario.",'".$nombre."');");
		return 0;

    }

    function getTComentario($id_tcomentario){
    	$query = $this->db->query("select 
	        							comentarios_tasks.id as id, 
	        							comentarios_tasks.id_task as id_task,
	        							comentarios_tasks.comentario as comentario
        							from 
        								comentarios_tasks
									where 
										comentarios_tasks.estado = 0
									and
										comentarios_tasks.id = ".$id_tcomentario);
		return $query->result();

    }
	function editTComentario($id_tcomentario,$id_task,$comentario){
		$query= $this->db->query("update 
										comentarios_tasks
									set 
										comentario = '".$comentario."',
										id_task = ".$id_task."
									where 
										id = ".$id_tcomentario);
		return 0;
	}

	function deleteTComentario($id_tcomentario){
		$query= $this->db->query("update 
										comentarios_tasks
									set 
										estado = 1
									where 
										id = ".$id_tcomentario);
		return 0;
	}

	function searchTComentario($search){
		$query = $this->db->query("select 
	        							comentarios_tasks.id as id, 
	        							comentarios_tasks.id_task as id_task, 
	        							comentarios_tasks.nombre as nombre
        							from 
        								comentarios_tasks
									where 
										comentarios_tasks.estado = 0
									and									
										comentarios_tasks.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>