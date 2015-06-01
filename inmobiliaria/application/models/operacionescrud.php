<?php
class OperacionesCRUD extends CI_Model {

    function OperacionesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getOperaciones()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones 
									where 
										operaciones.estado = 0
									order by
										operaciones.id");
		return $query->result();
    }
//
    function addOperacion($nombre){
    	$query= $this->db->query("insert into 
    								operaciones (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getOperacion($id_operacion){
    	$query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones
									where 
										operaciones.estado = 0
									and
										operaciones.id = ".$id_operacion);
		return $query->result();

    }
	function editOperacion($id_operacion,$nombre){
		$query= $this->db->query("update 
										operaciones
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_operacion);
		return 0;
	}

	function deleteOperacion($id_operacion){
		$query= $this->db->query("update 
										operaciones
									set 
										estado = 1
									where 
										id = ".$id_operacion);
		return 0;
	}

	function getOperacionesSearch($search){
		$query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones
									where 
										operaciones.estado = 0
									and									
										operaciones.nombre LIKE '%".$search."%'");
		return $query->result();

	}

	
}
?>