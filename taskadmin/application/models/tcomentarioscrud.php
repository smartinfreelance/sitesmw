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
	        							tcomentarios.id as id, 
	        							tcomentarios.id_task as id_task,
	        							tasks.nombre as nombre_task,
	        							tcomentarios.id_usuario as id_usuario,
	        							usuarios.nombre as nombre_usuario,
	        							usuarios.apellido as apellido_usuario,
	        							tcomentarios.comentario as comentario
        							from 
        								tcomentarios 
        							inner join
        								tasks
        							on
        								tasks.id = tcomentarios.id_task
        							inner join
        								usuarios
        							on
        								usuarios.id = tcomentarios.id_usuario
									where 
										tcomentarios.estado = 0
									and
										tasks.estado = 0
									and
										usuarios.estado = 0
									order by
										tcomentarios.id");
		return $query->result();
    }
//
    function addTComentario($id_task,$id_usuario,$nombre){
    	$query= $this->db->query("insert into 
									tcomentarios
    									(id_task,id_usuario,comentario)
									values 
    									(".$id_task.",".$id_usuario.",'".$nombre."');");
		return 0;

    }

    function getTComentario($id_tcomentario){
    	$query = $this->db->query("select 
	        							tcomentarios.id as id, 
	        							tcomentarios.id_task as id_task,
	        							tasks.nombre as nombre_task,
	        							tcomentarios.id_usuario as id_usuario,
	        							usuarios.nombre as nombre_usuario,
	        							usuarios.apellido as apellido_usuario,
	        							tcomentarios.comentario as comentario
        							from 
        								tcomentarios 
        							inner join
        								tasks
        							on
        								tasks.id = tcomentarios.id_task
        							inner join
        								usuarios
        							on
        								usuarios.id = tcomentarios.id_usuario
									where 
										tcomentarios.estado = 0
									and
										tasks.estado = 0
									and
										usuarios.estado = 0
									and
										tcomentarios.id = ".$id_tcomentario);
		return $query->result();

    }
	function editTComentario($id_tcomentario,$id_task,$comentario){
		$query= $this->db->query("update 
										tcomentarios
									set 
										comentario = '".$comentario."',
										id_task = ".$id_task."
									where 
										id = ".$id_tcomentario);
		return 0;
	}

	function deleteTComentario($id_tcomentario){
		$query= $this->db->query("update 
										tcomentarios
									set 
										estado = 1
									where 
										id = ".$id_tcomentario);
		return 0;
	}

	function searchTComentario($search){
		$query = $this->db->query("select 
	        							tcomentarios.id as id, 
	        							tcomentarios.id_task as id_task,
	        							tasks.nombre as nombre_task,
	        							tcomentarios.id_usuario as id_usuario,
	        							usuarios.nombre as nombre_usuario,
	        							usuarios.apellido as apellido_usuario,
	        							tcomentarios.comentario as comentario
        							from 
        								tcomentarios 
        							inner join
        								tasks
        							on
        								tasks.id = tcomentarios.id_task
        							inner join
        								usuarios
        							on
        								usuarios.id = tcomentarios.id_usuario
									where 
										tcomentarios.estado = 0
									and
										tasks.estado = 0
									and
										usuarios.estado = 0
									and									
										tcomentarios.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>