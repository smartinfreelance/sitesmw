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
										roles.id desc");
		return $query->result();
    }

    function getXRoles($desde,$cuantos)
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
										roles.id desc
									limit
                                        ".$desde.",".$cuantos." ");
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

	function deleteRol($id_rol){
		$query= $this->db->query("update 
										roles
									set 
										estado = 1
									where 
										id = ".$id_rol);
		return 0;
	}

	function getRolesSearch($search){
		$query = $this->db->query("select 
	        							roles.id as id, 
	        							roles.nombre as nombre
        							from 
        								roles
									where 
										roles.estado = 0
									and									
										roles.nombre LIKE '%".$search."%'
									order by
										roles.id desc");
		return $query->result();

	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										roles.id,
										roles.nombre
									from
										roles
									where
										roles.estado = 0
									and
										roles.nombre = '".$str."'");
		return $query->result();

	}


	/*PAGINATION FUNCTIONS*/
    function getCantRoles(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                    roles 
                                where 
                                    roles.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>