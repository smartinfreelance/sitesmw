<?php
class AmbientesCRUD extends CI_Model {

    function AmbientesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getAmbientes()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							ambientes.id as id, 
	        							ambientes.nombre as nombre
        							from 
        								ambientes 
									where 
										ambientes.estado = 0
									order by
										ambientes.id desc");
		return $query->result();
    }

    function getXAmbientes($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							ambientes.id as id, 
	        							ambientes.nombre as nombre
        							from 
        								ambientes 
									where 
										ambientes.estado = 0
									order by
										ambientes.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addAmbiente($nombre){
    	$query= $this->db->query("insert into 
    								ambientes (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getAmbiente($id_ambiente){
    	$query = $this->db->query("select 
	        							ambientes.id as id, 
	        							ambientes.nombre as nombre
        							from 
        								ambientes
									where 
										ambientes.estado = 0
									and
										ambientes.id = ".$id_ambiente);
		return $query->result();

    }
	function editAmbiente($id_ambiente,$nombre){
		$query= $this->db->query("update 
										ambientes
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_ambiente);
		return 0;
	}

	function deleteAmbiente($id_ambiente){
		$query= $this->db->query("update 
										ambientes
									set 
										estado = 1
									where 
										id = ".$id_ambiente);
		return 0;
	}

	function searchAmbiente($search){
		$query = $this->db->query("select 
	        							ambientes.id as id, 
	        							ambientes.nombre as nombre
        							from 
        								ambientes
									where 
										ambientes.estado = 0
									and									
										ambientes.nombre LIKE '%".$search."%'
									order by
										ambientes.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										ambientes.id,
										ambientes.nombre
									from
										ambientes
									where
										ambientes.estado = 0
									and
										ambientes.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantAmbientes(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        ambientes 
                                    where 
                                        ambientes.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	
	
}
?>