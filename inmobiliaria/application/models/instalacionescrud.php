<?php
class InstalacionesCRUD extends CI_Model {

    function InstalacionesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getInstalaciones()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							instalaciones.id as id, 
	        							instalaciones.nombre as nombre
        							from 
        								instalaciones 
									where 
										instalaciones.estado = 0
									order by
										instalaciones.id desc");
		return $query->result();
    }

    function getXInstalaciones($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							instalaciones.id as id, 
	        							instalaciones.nombre as nombre
        							from 
        								instalaciones 
									where 
										instalaciones.estado = 0
									order by
										instalaciones.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addInstalacion($nombre){
    	$query= $this->db->query("insert into 
    								instalaciones (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getInstalacion($id_instalacion){
    	$query = $this->db->query("select 
	        							instalaciones.id as id, 
	        							instalaciones.nombre as nombre
        							from 
        								instalaciones
									where 
										instalaciones.estado = 0
									and
										instalaciones.id = ".$id_instalacion);
		return $query->result();

    }

    function getInsByInmo($id_inmueble){
    	$query = $this->db->query("select 
										inmuebles_instalaciones.id as id, 
										inmuebles_instalaciones.id_instalacion as id_instalacion,
										inmuebles_instalaciones.id_inmueble as id_inmueble,
										instalaciones.nombre as nombre_instalacion
									from 
										inmuebles_instalaciones
									inner join
										instalaciones
									on
										inmuebles_instalaciones.id_instalacion = instalaciones.id
									where 
										inmuebles_instalaciones.estado = 0
									and
										instalaciones.estado = 0
									and
										inmuebles_instalaciones.id_inmueble = ".$id_inmueble);
		return $query->result();

    }
    function removeInsByInmo($id_inmueble){
    	$query = $this->db->query("update 
										inmuebles_instalaciones
									set 
										estado = 1
									where 
										id_inmueble = ".$id_inmueble);
		return 0;
    }

	function editInstalacion($id_instalacion,$nombre){
		$query= $this->db->query("update 
										instalaciones
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_instalacion);
		return 0;
	}

	function deleteInstalacion($id_instalacion){
		$query= $this->db->query("update 
										instalaciones
									set 
										estado = 1
									where 
										id = ".$id_instalacion);
		return 0;
	}

	function searchInstalacion($search){
		$query = $this->db->query("select 
	        							instalaciones.id as id, 
	        							instalaciones.nombre as nombre
        							from 
        								instalaciones
									where 
										instalaciones.estado = 0
									and									
										instalaciones.nombre LIKE '%".$search."%'
									order by
										instalaciones.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										instalaciones.id,
										instalaciones.nombre
									from
										instalaciones
									where
										instalaciones.estado = 0
									and
										instalaciones.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantInstalaciones(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        instalaciones 
                                    where 
                                        instalaciones.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }

    function addInmoInst($id_inmueble,$id_instalacion){
    	$query= $this->db->query("insert into 
    								inmuebles_instalaciones (
    									id_inmueble,
    									id_instalacion) 
    								values (
    									".$id_inmueble.",
    									".$id_instalacion.")");
		return 0;
    }
	
}
?>