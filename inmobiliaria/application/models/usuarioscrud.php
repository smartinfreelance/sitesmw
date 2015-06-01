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
	        							usuarios.id_rol as id_rol, 
	        							roles.nombre as rol,
	        							usuarios.mail as mail, 
	        							usuarios.fecha_nac as fecha_nac
        							from 
        								usuarios 
									inner join 
										roles on roles.id = usuarios.id_rol 
									where 
										usuarios.estado = 0
									order by
										usuarios.id");
		return $query->result();
    }
//
    function addUsuario($usuario, $nombre,$apellido,$password, $mail,$fecha_nac,$id_rol){
    	$query= $this->db->query("insert into 
    								usuarios (
    									usuario,
    									password,
    									nombre,
    									apellido,
    									fecha_nac,
    									id_rol,
    									mail
    									) 
    								values (
    									'".$usuario."',
    									md5('".$password."'),
    									'".$nombre."',
    									'".$apellido."',
    									'".$fecha_nac."',
    									".$id_rol.",
    									'".$mail."'
    									)");
		return 0;

    }

    function getUsuario($id_usuario){
    	$query = $this->db->query("select 
	        							usuarios.id as id, 
	        							usuarios.usuario as usuario, 
	        							usuarios.nombre as nombre, 
	        							usuarios.apellido as apellido, 
	        							usuarios.id_rol as id_rol, 
	        							roles.nombre as rol,
	        							usuarios.mail as mail, 
	        							usuarios.fecha_nac as fecha_nac
        							from 
        								usuarios 
									inner join 
										roles on roles.id = usuarios.id_rol 
									where 
										usuarios.estado = 0
									and
										usuarios.id = ".$id_usuario);
		return $query->result();

    }
	function editUsuario($id, $usuario, $nombre, $apellido, $mail, $fecha_nac, $id_rol){
		$query= $this->db->query("update 
										usuarios 
									set 
	        							usuario = '".$usuario."', 
	        							nombre = '".$nombre."', 
	        							apellido = '".$apellido."',  
	        							id_rol = ".$id_rol.",  
	        							mail = '".$mail."',  
	        							fecha_nac = '".$fecha_nac."' 
									where 
										id = ".$id);
		return 0;
	}

	function eliminarUsuario($idUsuario){
		$query= $this->db->query("update 
										usuarios 
									set 
										estado = 1
									where 
										id = ".$idUsuario);
		return 0;
	}

	function searchUsuarios($search){
		$query = $this->db->query("select 
	        							usuarios.id as id, 
	        							usuarios.usuario as usuario, 
	        							usuarios.nombre as nombre, 
	        							usuarios.apellido as apellido, 
	        							usuarios.id_rol as id_rol, 
	        							roles.nombre as rol,
	        							usuarios.mail as mail, 
	        							usuarios.fecha_nac as fecha_nac
        							from 
        								usuarios 
									inner join 
										roles on roles.id = usuarios.id_rol 
									where 
										usuarios.estado = 0
									and									
										(usuarios.nombre LIKE '%".$search."%'
									or
										usuarios.apellido LIKE '%".$search."%'
									or
										usuarios.usuario LIKE '%".$search."%'
									or
										usuarios.mail LIKE '%".$search."%'
									or
										roles.nombre LIKE '%".$search."%'
									)");
		return $query->result();
	}
	
}
?>