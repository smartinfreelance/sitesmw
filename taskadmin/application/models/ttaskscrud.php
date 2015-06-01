<?php
class TTasksCRUD extends CI_Model {

    function TTasksCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTTasks()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							tipos_tasks.id as id, 
	        							tipos_tasks.nombre as nombre
        							from 
        								tipos_tasks 
									where 
										tipos_tasks.estado = 0
									order by
										tipos_tasks.id");
		return $query->result();
    }
//
    function addTTask($nombre){
    	$query= $this->db->query("insert into 
    								tipos_tasks (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getTTask($id_ttask){
    	$query = $this->db->query("select 
	        							tipos_tasks.id as id, 
	        							tipos_tasks.nombre as nombre
        							from 
        								tipos_tasks
									where 
										tipos_tasks.estado = 0
									and
										tipos_tasks.id = ".$id_ttask);
		return $query->result();

    }
	function editTTask($id_ttask,$nombre){
		$query= $this->db->query("update 
										tipos_tasks
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_ttask);
		return 0;
	}

	function deleteTTask($id_ttask){
		$query= $this->db->query("update 
										tipos_tasks
									set 
										estado = 1
									where 
										id = ".$id_ttask);
		return 0;
	}

	function searchTTask($search){
		$query = $this->db->query("select 
	        							tipos_tasks.id as id, 
	        							tipos_tasks.nombre as nombre
        							from 
        								tipos_tasks
									where 
										tipos_tasks.estado = 0
									and									
										tipos_tasks.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>