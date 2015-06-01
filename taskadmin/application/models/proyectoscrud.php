<?php
class ProyectosCRUD extends CI_Model {

    function ProyectosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getProyectos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							proyectos.id as id, 
	        							proyectos.nombre as nombre
        							from 
        								proyectos 
									where 
										proyectos.estado = 0
									order by
										proyectos.id");
		return $query->result();
    }
//
    function addProyecto($nombre){
    	$query= $this->db->query("insert into 
    								proyectos (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getProyecto($idProyecto){
    	$query = $this->db->query("select 
	        							proyectos.id as id, 
	        							proyectos.nombre as nombre
        							from 
        								proyectos
									where 
										proyectos.estado = 0
									and
										proyectos.id = ".$id_rol);
		return $query->result();

    }
	function editProyecto($id_proyecto,$nombre){
		$query= $this->db->query("update 
										proyectos
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_proyecto);
		return 0;
	}

	function deleteProyecto($id_proyecto){
		$query= $this->db->query("update 
										proyectos
									set 
										estado = 1
									where 
										id = ".$id_proyecto);
		return 0;
	}

	function searchProyecto($search){
		$query = $this->db->query("select 
	        							proyectos.id as id, 
	        							proyectos.nombre as nombre
        							from 
        								proyectos
									where 
										proyectos.estado = 0
									and									
										proyectos.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	
}
?>