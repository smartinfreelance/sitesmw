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
										roles.nombre as nombre,
										roles.id_superior as id_superior
									from
										roles
									where
										roles.estado = 0
									order by
										roles.id asc");
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
										roles.nombre as nombre,
										roles.id_superior as id_superior
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
    function addRol($nombre,$id_superior){
    	$query= $this->db->query("insert into 
    								roles (
    									nombre,
    									id_superior) 
    								values (
    									'".$nombre."',
    									".$id_superior.")");
		return 0;

    }

    function getRol($id_rol){
    	$query = $this->db->query("select 
										roles.id as id,
										roles.nombre as nombre,
										roles.id_superior as id_superior
									from
										roles
									where
										roles.estado = 0
									and
										roles.id = ".$id_rol);
		return $query->result();

    }
	function editRol($id_rol,$nombre,$id_superior){
		$query= $this->db->query("update 
										roles
									set 
										nombre = '".$nombre."',
										id_superior = '".$id_superior."'
									where 
										id = ".$id_rol);
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

	function searchRol($search){
		$query = $this->db->query("select 
	        							roles.id as id, 
	        							roles.nombre as nombre,
	        							roles.id_superior as id_superior
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
	
}
?>