<?php
class THistorialesCRUD extends CI_Model {

    function THistorialesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTHistoriales()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
										historial_tasks.log as log,
										historial_tasks.id_task as id_task,
										tasks.nombre as task,
										historial_tasks.id_accion as id_accion,
										acciones.nombre as accion,
										historial_tasks.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										historial_tasks.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										historial_tasks
									inner join
										tasks
									on
										tasks.id = historial_tasks.id_task
									inner join
										acciones
									on
										acciones.id = historial_tasks.id_accion
									inner join
										usuarios
									on
										usuarios.id = historial_tasks.id_usuario
									inner join
										estados
									on
										estados.id = historial_tasks.id_estado
									where
										historial_tasks.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									order by
										historial_tasks.id");
		return $query->result();
    }
//
    function addTHistorial($nombre){
    	$query= $this->db->query("insert into 
									historial_tasks 
										(log,id_task,id_accion, id_usuario,id_estado) 
								values 
										('".$log."',".$id_task.",".$id_accion.",".$id_usuario.",".$id_estado.")");
		return 0;

    }

    function getTHistorial($thistorial){
    	$query = $this->db->query("select
										historial_tasks.log as log,
										historial_tasks.id_task as id_task,
										tasks.nombre as task,
										historial_tasks.id_accion as id_accion,
										acciones.nombre as accion,
										historial_tasks.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										historial_tasks.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										historial_tasks
									inner join
										tasks
									on
										tasks.id = historial_tasks.id_task
									inner join
										acciones
									on
										acciones.id = historial_tasks.id_accion
									inner join
										usuarios
									on
										usuarios.id = historial_tasks.id_usuario
									inner join
										estados
									on
										estados.id = historial_tasks.id_estado
									where
										historial_tasks.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									and
										historial_tasks.id = ".$id_thistorial);
		return $query->result();

    }
	function editTHistorial($id_thistorial,$log,$id_task,$id_accion,$id_usuario,$id_estado){
		$query= $this->db->query("update 
									historial_tasks 
								set 
									log = '".$log"', 
									id_task = ".$id_task.",
									id_accion =  ".$id_accion.",
									id_usuario =  ".$id_usuario.",
									id_estado =  ".$id_estado."
								where 
									historial_tasks.id = ".$id_thistorial);
		return 0;
	}

	function deleteTHistorial($id_thistorial){
		$query= $this->db->query("update 
										historial_tasks
									set 
										historial_tasks.estado = 1
									where 
										historial_tasks.id = ".$id_thistorial);
		return 0;
	}

	function searchTHistorial($search){
		$query = $this->db->query("select
										historial_tasks.log as log,
										historial_tasks.id_task as id_task,
										tasks.nombre as task,
										historial_tasks.id_accion as id_accion,
										acciones.nombre as accion,
										historial_tasks.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										historial_tasks.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										historial_tasks
									inner join
										tasks
									on
										tasks.id = historial_tasks.id_task
									inner join
										acciones
									on
										acciones.id = historial_tasks.id_accion
									inner join
										usuarios
									on
										usuarios.id = historial_tasks.id_usuario
									inner join
										estados
									on
										estados.id = historial_tasks.id_estado
									where
										historial_tasks.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									and									
										historial_tasks.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>