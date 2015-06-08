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

	function getXProyectos($desde,$cuantos)
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
									limit
                                        ".$desde.",".$cuantos." ");
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

    function getProyecto($id_proyecto){
    	$query = $this->db->query("select 
	        							proyectos.id as id, 
	        							proyectos.nombre as nombre
        							from 
        								proyectos
									where 
										proyectos.estado = 0
									and
										proyectos.id = ".$id_proyecto);
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

	/*PAGINATION FUNCTIONS*/
    function getCantProyectos(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        proyectos 
                                    where 
                                        proyectos.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										proyectos.id,
										proyectos.nombre
									from
										proyectos
									where
										proyectos.estado = 0
									and
										proyectos.nombre = '".$str."'");
		return $query->result();

	}
	
}
?>