<?php
class RolesCRUD extends CI_Model {

    function RolesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getRoles()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							roles.id as id, 
	        							roles.nombre as nombre
        							from 
        								roles 
									where 
										roles.estado = 0
									order by
										roles.id");
		return $query->result();
    }
//
    function addRol($nombre){
    	$query= $this->db->query("insert into 
    								roles (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getRol($id_rol){
    	$query = $this->db->query("select 
	        							roles.id as id, 
	        							roles.nombre as nombre
        							from 
        								roles
									where 
										roles.estado = 0
									and
										roles.id = ".$id_rol);
		return $query->result();

    }
	function editRol($idRol,$nombre){
		$query= $this->db->query("update 
										roles
									set 
										nombre = '".$nombre."'
									where 
										id = ".$idRol);
		return 0;
	}

	function eliminarRol($idRol){
		$query= $this->db->query("update 
										roles
									set 
										estado = 1
									where 
										id = ".$idRol);
		return 0;
	}

	
}
?>