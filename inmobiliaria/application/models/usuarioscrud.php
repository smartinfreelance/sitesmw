<?php
class UsuariosCRUD extends CI_Model {

    function UsuariosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getUsuarios()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
        								usuarios.id as id,
										usuarios.usuario as usuario,
										usuarios.nombre as nombre,
										usuarios.apellido as apellido,
										usuarios.mail as mail,
										usuarios.id_rol as id_rol,
										roles.nombre as rol
									from
										usuarios
									inner join
										roles
									on
										roles.id = usuarios.id_rol
									where
										usuarios.estado = 0
									and
										roles.estado = 0
									order by
										usuarios.id desc");
		return $query->result();
    }

	function getXUsuarios($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
        								usuarios.id as id,
										usuarios.usuario as usuario,
										usuarios.nombre as nombre,
										usuarios.apellido as apellido,
										usuarios.mail as mail,
										usuarios.id_rol as id_rol,
										roles.nombre as rol
									from
										usuarios
									inner join
										roles
									on
										roles.id = usuarios.id_rol
									where
										usuarios.estado = 0
									and
										roles.estado = 0
									order by
										usuarios.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }    
//
    function addUsuario($usuario,$password,$nombre,$apellido,$mail,$id_rol){
    	$query= $this->db->query("insert into 
									usuarios 
										(usuario, password,nombre,apellido,mail,id_rol) 
								values 
										('".$usuario."', md5('".$password."'),'".$nombre."', '".$apellido."', '".$mail."',".$id_rol.")");
		return 0;

    }

    function getUsuario($id_usuario){
    	$query = $this->db->query("select
    									usuarios.id as id,
										usuarios.usuario as usuario,
										usuarios.nombre as nombre,
										usuarios.apellido as apellido,
										usuarios.mail as mail,
										usuarios.id_rol as id_rol,
										roles.nombre as rol
									from
										usuarios
									inner join
										roles
									on
										roles.id = usuarios.id_rol
									where
										usuarios.estado = 0
									and
										roles.estado = 0
									and
										usuarios.id = ".$id_usuario);
		return $query->result();

    }
	function editUsuario($id_usuario,$nombre,$apellido,$id_rol,$mail){
		$query= $this->db->query("update 
										usuarios 
									set 
										nombre = '".$nombre."',
										apellido = '".$apellido."',
										mail = '".$mail."',
										id_rol = ".$id_rol."
									where 
										usuarios.id = ".$id_usuario);
		return 0;
	}

	function deleteUsuario($id_usuario){
		$query= $this->db->query("update 
										usuarios
									set 
										estado = 1
									where 
										id = ".$id_usuario);
		return 0;
	}

	function searchUsuario($search){
		$query = $this->db->query("select
										usuarios.usuario as usuario,
										usuarios.nombre as nombre,
										usuarios.apellido as apellido,
										usuarios.mail as mail,
										usuarios.id_rol as id_rol,
										roles.nombre as rol
									from
										usuarios
									inner join
										roles
									on
										roles.id = usuarios.id_rol
									where 
										usuarios.estado = 0
									and
										roles.estado = 0
									and									
										usuarios.nombre LIKE '%".$search."%'
									order by
										usuarios.id desc");
		return $query->result();
	}
	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										usuarios.id,
										usuarios.nombre
									from
										usuarios
									where
										usuarios.estado = 0
									and
										usuarios.nombre = '".$str."'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantUsuarios(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        usuarios 
                                    where 
                                        usuarios.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }		
	
}
?>