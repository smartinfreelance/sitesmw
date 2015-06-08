<?php
class TContactosCRUD extends CI_Model {

    function TContactosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTContactos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							tipos_contactos.id as id, 
	        							tipos_contactos.nombre as nombre
        							from 
        								tipos_contactos 
									where 
										tipos_contactos.estado = 0
									order by
										tipos_contactos.id desc");
		return $query->result();
    }

    function getXTContactos($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							tipos_contactos.id as id, 
	        							tipos_contactos.nombre as nombre
        							from 
        								tipos_contactos 
									where 
										tipos_contactos.estado = 0
									order by
										tipos_contactos.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addTContacto($nombre){
    	$query= $this->db->query("insert into 
    								tipos_contactos (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getTContacto($id_tcontacto){
    	$query = $this->db->query("select 
	        							tipos_contactos.id as id, 
	        							tipos_contactos.nombre as nombre
        							from 
        								tipos_contactos
									where 
										tipos_contactos.estado = 0
									and
										tipos_contactos.id = ".$id_tcontacto);
		return $query->result();

    }
	function editTContacto($id_tcontacto,$nombre){
		$query= $this->db->query("update 
										tipos_contactos
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_tcontacto);
		return 0;
	}

	function deleteTContacto($id_tcontacto){
		$query= $this->db->query("update 
										tipos_contactos
									set 
										estado = 1
									where 
										id = ".$id_tcontacto);
		return 0;
	}

	function searchTContacto($search){
		$query = $this->db->query("select 
	        							tipos_contactos.id as id, 
	        							tipos_contactos.nombre as nombre
        							from 
        								tipos_contactos
									where 
										tipos_contactos.estado = 0
									and									
										tipos_contactos.nombre LIKE '%".$search."%'
									order by
										tipos_contactos.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										tipos_contactos.id,
										tipos_contactos.nombre
									from
										tipos_contactos
									where
										tipos_contactos.estado = 0
									and
										tipos_contactos.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantTContactos(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        tipos_contactos 
                                    where 
                                        tipos_contactos.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	
	
}
?>