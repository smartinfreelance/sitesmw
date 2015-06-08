<?php
class EstadosCRUD extends CI_Model {

    function EstadosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getEstados()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
										estados.id,
										estados.nombre
									from
										estados
									where
										estados.estado = 0
									order by
										estados.id asc");
		return $query->result();
    }

	function getXEstados($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
										estados.id,
										estados.nombre
									from
										estados
									where
										estados.estado = 0
									order by
										estados.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }    
//
    function addEstado($nombre){
    	$query= $this->db->query("insert into 
    								estados (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getEstado($id_estado){
    	$query = $this->db->query("select 
										estados.id,
										estados.nombre
									from
										estados
									where
										estados.estado = 0
									and
										estados.id = ".$id_estado);
		return $query->result();

    }
	function editEstado($id_estado,$nombre){
		$query= $this->db->query("update 
										estados
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_estado);
		return 0;
	}

	function deleteEstado($id_estado){
		$query= $this->db->query("update 
										estados
									set 
										estado = 1
									where 
										id = ".$id_estado);
		return 0;
	}

	function searchEstado($search){
		$query = $this->db->query("select 
	        							estados.id as id, 
	        							estados.nombre as nombre
        							from 
        								estados
									where 
										estados.estado = 0
									and									
										estados.nombre LIKE '%".$search."%'
									order by
										estados.id desc");
		return $query->result();
	}

	/*PAGINATION FUNCTIONS*/
    function getCantEstados(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        estados 
                                    where 
                                        estados.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }
	
	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										estados.id,
										estados.nombre
									from
										estados
									where
										estados.estado = 0
									and
										estados.nombre = '".$str."'");
		return $query->result();

	}
	
}
?>