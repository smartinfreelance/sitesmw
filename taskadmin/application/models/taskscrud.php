<?php
class TasksCRUD extends CI_Model {

    function TasksCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTasks()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
										tasks.id as id,
										tasks.nombre as nombre,
										tasks.descripcion as descripcion,
										tasks.demora as demora,
										tasks.demora_actual as demora_actual,
										tasks.id_proyecto as id_proyecto,
										proyectos.nombre as nombre_proyecto,
										tasks.id_tipo as id_tipo,
										ttasks.nombre as tipo_task,
										tasks.id_estado as id_estado,
										estados.nombre as estado_nombre,
										tasks.id_asignado as id_asignado,
										usuarios.nombre as nombre_asignado,
										usuarios.apellido as apellido_asignado
									from
										tasks
									inner join
										proyectos 
									on
										proyectos.id = tasks.id_proyecto
									inner join
										ttasks
									on
										ttasks.id = tasks.id_tipo
									inner join
										estados
									on
										estados.id = tasks.id_estado
									inner join
										usuarios
									on
										usuarios.id = tasks.id_asignado
									where
										tasks.estado = 0
									and
										proyectos.estado = 0
									and
										ttasks.estado = 0
									and
										estados.estado = 0
									and
										usuarios.estado = 0
									order by
										tasks.id");
		return $query->result();
    }
//
    function addTask($nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado){
    	$query= $this->db->query("insert into 
									tasks 
										(nombre,descripcion,demora,demora_actual,id_proyecto,id_tipo,id_estado) 
								values 
										('".$nombre."', '".$descripcion."', '".$demora."', '".$demora_actual."', ".$id_proyecto.",".$id_tipo.",".$id_estado.")");
		return 0;

    }

    function getTask($id_task){
    	$query = $this->db->query("select
										tasks.id as id,
										tasks.nombre as nombre,
										tasks.descripcion as descripcion,
										tasks.demora as demora,
										tasks.demora_actual as demora_actual,
										tasks.id_proyecto as id_proyecto,
										proyectos.nombre as nombre_proyecto,
										tasks.id_tipo as id_tipo,
										ttasks.nombre as tipo_task,
										tasks.id_estado as id_estado,
										estados.nombre as estado_nombre,
									from
										tasks
									inner join
										proyectos 
									on
										proyectos.id = tasks.id_proyecto
									inner join
										ttasks
									on
										ttasks.id = tasks.id_tipo
									inner join
										estados
									on
										estados.id = tasks.id_estado
									where
										tasks.estado = 0
									and
										proyectos.estado = 0
									and
										ttasks.estado = 0
									and
										estados.estado = 0
									and
										tasks.id = ".$id_task);
		return $query->result();

    }
	function editTask($id_task,$nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado){
		$query= $this->db->query("update 
									tasks 
								set 
									tasks.nombre = '".$nombre." ,'
									tasks.descripcion = '".$descripcion."'' ,
									tasks.demora = '".$demora."', 
									tasks.demora_actual = '".$demora_actual."', 
									tasks.id_proyecto = ".$id_proyecto.", 
									tasks.id_tipo = ".$id_tipo.", 
									tasks.id_estado = ".$id_estado."
								where 
									tasks.id = ".$id_task);
		return 0;
	}

	function deleteTask($id_task){
		$query= $this->db->query("update 
										tasks
									set 
										tasks.estado = 1
									where 
										tasks.id = ".$id_task);
		return 0;
	}

	function searchTask($search){
		$query = $this->db->query("select
										tasks.id as id,
										tasks.nombre as nombre,
										tasks.descripcion as descripcion,
										tasks.demora as demora,
										tasks.demora_actual as demora_actual,
										tasks.id_proyecto as id_proyecto,
										proyectos.nombre as nombre_proyecto,
										tasks.id_tipo as id_tipo,
										ttasks.nombre as tipo_task,
										tasks.id_estado as id_estado,
										estados.nombre as estado_nombre,
									from
										tasks
									inner join
										proyectos 
									on
										proyectos.id = tasks.id_proyecto
									inner join
										ttasks
									on
										ttasks.id = tasks.id_tipo
									inner join
										estados
									on
										estados.id = tasks.id_estado
									where
										tasks.estado = 0
									and
										proyectos.estado = 0
									and
										ttasks.estado = 0
									and
										estados.estado = 0
									and									
										(tasks.nombre LIKE '%".$search."%'
									or
										tasks.descripcion LIKE '%".$search."%'
									or
										proyectos.nombre LIKE '%".$search."%'
									or
										ttasks.nombre LIKE '%".$search."%'
									or
										estados.nombre LIKE '%".$search."%')");
		return $query->result();
	}

	
}
?>