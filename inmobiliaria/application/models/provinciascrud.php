<?php
class ProvinciasCRUD extends CI_Model {

    function ProvinciasCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getProvincias()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							provincias.id as id, 
	        							provincias.nombre as nombre
        							from 
        								provincias 
									order by
										provincias.id");
		return $query->result();
    }

    function getXProvincias($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							provincias.id as id, 
	        							provincias.nombre as nombre
        							from 
        								provincias 
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addProvincia($nombre){
    	$query= $this->db->query("insert into 
    								provincias (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getProvincia($id_provincia){
    	$query = $this->db->query("select 
	        							provincias.id as id, 
	        							provincias.nombre as nombre
        							from 
        								provincias
									and
										provincias.id = ".$id_provincia);
		return $query->result();

    }
	function editProvincia($idProvincia,$nombre){
		$query= $this->db->query("update 
										provincias
									set 
										nombre = '".$nombre."'
									where 
										id = ".$idProvincia);
		return 0;
	}

	function deleteProvincia($id_provincia){
		$query= $this->db->query("update 
										provincias
									set 
										estado = 1
									where 
										id = ".$id_provincia);
		return 0;
	}

	function getProvinciasSearch($search){
		$query = $this->db->query("select 
	        							provincias.id as id, 
	        							provincias.nombre as nombre
        							from 
        								provincias
									and									
										provincias.nombre LIKE '%".$search."%'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantProvincias(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        provincias");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>