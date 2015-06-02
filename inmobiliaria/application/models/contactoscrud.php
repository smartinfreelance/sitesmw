<?php
class ContactosCRUD extends CI_Model {

    function ContactosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getContactos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							contactos.id as id, 
	        							contactos.nombre as nombre,
	        							contactos.telefono as telefono,
	        							contactos.id_tipo as id_tipo,
	        							tipos_contactos.nombre as tipo_contacto,
	        							contactos.mail as mail
        							from 
        								contactos 
        							inner join
        								tipos_contactos 
        							on
        								tipos_contactos.id = contactos.id_tipo
									where 
										contactos.estado = 0
									order by
										contactos.id");
		return $query->result();
    }
//
    function addContacto($nombre,$telefono,$id_tipo,$mail){
    	$query= $this->db->query("insert into 
    								contactos (
    									nombre,
    									telefono,
    									id_tipo,
    									mail) 
    								values (
    									'".$nombre."',
    									'".$telefono."',
    									".$id_tipo.",
    									'".$mail."')");
		return 0;

    }

    function getContacto($id_contacto){
    	$query = $this->db->query("select 
	        							contactos.id as id, 
	        							contactos.nombre as nombre,
	        							contactos.telefono as telefono,
	        							contactos.id_tipo as id_tipo,
	        							tipos_contactos.nombre as tipo_contacto,
	        							contactos.mail as mail
        							from 
        								contactos
        							inner join
        								tipos_contactos 
        							on
        								tipos_contactos.id = contactos.id_tipo
									where 
										contactos.estado = 0
									and
										contactos.id = ".$id_contacto);
		return $query->result();

    }
	function editContacto($id_contacto,$nombre,$telefono,$id_tipo,$mail){
		$query= $this->db->query("update 
										contactos
									set 
										nombre = '".$nombre."',
										telefono = '".$telefono."',
										id_tipo = ".$id_tipo.",
										mail = '".$mail."'
									where 
										id = ".$idContacto);
		return 0;
	}

	function deleteContacto($idContacto){
		$query= $this->db->query("update 
										contactos
									set 
										estado = 1
									where 
										id = ".$idContacto);
		return 0;
	}

	function getContactosSearch($search){
		$query = $this->db->query("select 
	        							contactos.id as id, 
	        							contactos.nombre as nombre,
	        							contactos.telefono as telefono,
	        							contactos.id_tipo as id_tipo,
	        							tipos_contactos.nombre as tipo_contacto,
	        							contactos.mail as mail
        							from 
        								contactos
        							inner join
        								tipos_contactos 
        							on
        								tipos_contactos.id = contactos.id_tipo
									where 
										contactos.estado = 0
									and									
										(contactos.nombre LIKE '%".$search."%'
									or
										contactos.telefono LIKE '%".$search."%'
									or
										contactos.mail LIKE '%".$search."%')");
		return $query->result();

	}

	
}
?>