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
        								thistoriales.id as id,
										thistoriales.log as log,
										thistoriales.id_task as id_task,
										tasks.nombre as task,
										thistoriales.id_accion as id_accion,
										acciones.nombre as accion,
										thistoriales.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										thistoriales.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										thistoriales
									inner join
										tasks
									on
										tasks.id = thistoriales.id_task
									inner join
										acciones
									on
										acciones.id = thistoriales.id_accion
									inner join
										usuarios
									on
										usuarios.id = thistoriales.id_usuario
									inner join
										estados
									on
										estados.id = thistoriales.id_estado
									where
										thistoriales.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									order by
										thistoriales.id");
		return $query->result();
    }
//
    function addTHistorial($log,$id_task,$id_accion,$id_usuario,$id_estado){
    	$query= $this->db->query("insert into 
									thistoriales 
										(log,id_task,id_accion, id_usuario,id_estado) 
								values 
										('".$log."',".$id_task.",".$id_accion.",".$id_usuario.",".$id_estado.")");
		return 0;

    }

    function getTHistorial($id_thistorial){
    	$query = $this->db->query("select
    									thistoriales.id as id,
										thistoriales.log as log,
										thistoriales.id_task as id_task,
										tasks.nombre as task,
										thistoriales.id_accion as id_accion,
										acciones.nombre as accion,
										thistoriales.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										thistoriales.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										thistoriales
									inner join
										tasks
									on
										tasks.id = thistoriales.id_task
									inner join
										acciones
									on
										acciones.id = thistoriales.id_accion
									inner join
										usuarios
									on
										usuarios.id = thistoriales.id_usuario
									inner join
										estados
									on
										estados.id = thistoriales.id_estado
									where
										thistoriales.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									and
										thistoriales.id = ".$id_thistorial);
		return $query->result();

    }
	function editTHistorial($id_thistorial,$log,$id_task,$id_accion,$id_usuario,$id_estado){
		$query= $this->db->query("update 
									thistoriales 
								set 
									log = '".$log."', 
									id_task = ".$id_task.",
									id_accion =  ".$id_accion.",
									id_usuario =  ".$id_usuario.",
									id_estado =  ".$id_estado."
								where 
									thistoriales.id = ".$id_thistorial);
		return 0;
	}

	function deleteTHistorial($id_thistorial){
		$query= $this->db->query("update 
										thistoriales
									set 
										thistoriales.estado = 1
									where 
										thistoriales.id = ".$id_thistorial);
		return 0;
	}

	function searchTHistorial($search){
		$query = $this->db->query("select
										thistoriales.log as log,
										thistoriales.id_task as id_task,
										tasks.nombre as task,
										thistoriales.id_accion as id_accion,
										acciones.nombre as accion,
										thistoriales.id_usuario as id_usuario,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										thistoriales.id_estado as id_estado,
										estados.nombre as nombre_estado
									from
										thistoriales
									inner join
										tasks
									on
										tasks.id = thistoriales.id_task
									inner join
										acciones
									on
										acciones.id = thistoriales.id_accion
									inner join
										usuarios
									on
										usuarios.id = thistoriales.id_usuario
									inner join
										estados
									on
										estados.id = thistoriales.id_estado
									where
										thistoriales.estado = 0
									and
										usuarios.estado = 0
									and
										tasks.estado = 0
									and
										acciones.estado = 0
									and
										estados.estado = 0	
									and									
										thistoriales.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>