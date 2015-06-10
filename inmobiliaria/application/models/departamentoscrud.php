<?php
class DepartamentosCRUD extends CI_Model {

    function DepartamentosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getDepartamentos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							departamentos.id as id, 
	        							departamentos.nombre as nombre
        							from 
        								departamentos 
									order by
										departamentos.id");
		return $query->result();
    }

    function getDeptosByProvincia($id_provincia){
    	$query = $this->db->query("select 
	        							departamentos.id as id, 
	        							departamentos.nombre as nombre
        							from 
        								departamentos 
        							where
        								departamentos.provincia_id = ".$id_provincia."
									order by
										departamentos.id");
		return $query->result();

    }

    function getXDepartamentos($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							departamentos.id as id, 
	        							departamentos.nombre as nombre
        							from 
        								departamentos 
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addDepartamento($nombre){
    	$query= $this->db->query("insert into 
    								departamentos (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getDepartamento($id_departamento){
    	$query = $this->db->query("select 
	        							departamentos.id as id, 
	        							departamentos.nombre as nombre
        							from 
        								departamentos
									and
										departamentos.id = ".$id_departamento);
		return $query->result();

    }
	function editDepartamento($idDepartamento,$nombre){
		$query= $this->db->query("update 
										departamentos
									set 
										nombre = '".$nombre."'
									where 
										id = ".$idDepartamento);
		return 0;
	}

	function deleteDepartamento($id_departamento){
		$query= $this->db->query("update 
										departamentos
									set 
										estado = 1
									where 
										id = ".$id_departamento);
		return 0;
	}

	function getDepartamentosSearch($search){
		$query = $this->db->query("select 
	        							departamentos.id as id, 
	        							departamentos.nombre as nombre
        							from 
        								departamentos
									and									
										departamentos.nombre LIKE '%".$search."%'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantDepartamentos(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        departamentos");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>