<?php
class LocalidadesCRUD extends CI_Model {

    function LocalidadesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getLocalidades()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							localidades.id as id, 
	        							localidades.nombre as nombre
        							from 
        								localidades 
									order by
										localidades.id");
		return $query->result();
    }

    function getProdByDepto($id_depto){
    	$query = $this->db->query("select 
	        							localidades.id as id, 
	        							localidades.nombre as nombre
        							from 
        								localidades 
        							where
        								localidades.departamento_id = ".$id_depto."
									order by
										localidades.id");
		return $query->result();

    }

    function getXLocalidades($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							localidades.id as id, 
	        							localidades.nombre as nombre
        							from 
        								localidades 
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addLocalidad($nombre){
    	$query= $this->db->query("insert into 
    								localidades (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getLocalidad($id_localidad){
    	$query = $this->db->query("select 
	        							localidades.id as id, 
	        							localidades.nombre as nombre
        							from 
        								localidades
									and
										localidades.id = ".$id_localidad);
		return $query->result();

    }
	function editLocalidad($idLocalidad,$nombre){
		$query= $this->db->query("update 
										localidades
									set 
										nombre = '".$nombre."'
									where 
										id = ".$idLocalidad);
		return 0;
	}

	function deleteLocalidad($id_localidad){
		$query= $this->db->query("update 
										localidades
									set 
										estado = 1
									where 
										id = ".$id_localidad);
		return 0;
	}

	function getLocalidadesSearch($search){
		$query = $this->db->query("select 
	        							localidades.id as id, 
	        							localidades.nombre as nombre
        							from 
        								localidades
									and									
										localidades.nombre LIKE '%".$search."%'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantLocalidades(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        localidades");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>