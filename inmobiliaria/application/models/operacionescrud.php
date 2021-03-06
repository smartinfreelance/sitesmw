<?php
class OperacionesCRUD extends CI_Model {

    function OperacionesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getOperaciones()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones 
									where 
										operaciones.estado = 0
									order by
										operaciones.id desc");
		return $query->result();
    }

    function getXOperaciones($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones 
									where 
										operaciones.estado = 0
									order by 
										operaciones.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }

    function getOperacionesToSearch(){
    	$query = $this->db->query("select
										operaciones.id as id,
										operaciones.nombre as nombre
									from
										operaciones
									inner join
										inmuebles
									on
										inmuebles.id_operacion = operaciones.id
									where
										inmuebles.estado = 0
									group by
										operaciones.id");
		return $query->result();

    }
//
    function addOperacion($nombre){
    	$query= $this->db->query("insert into 
    								operaciones (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getOperacion($id_operacion){
    	$query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones
									where 
										operaciones.estado = 0
									and
										operaciones.id = ".$id_operacion);
		return $query->result();

    }
	function editOperacion($id_operacion,$nombre){
		$query= $this->db->query("update 
										operaciones
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_operacion);
		return 0;
	}

	function deleteOperacion($id_operacion){
		$query= $this->db->query("update 
										operaciones
									set 
										estado = 1
									where 
										id = ".$id_operacion);
		return 0;
	}

	function getOperacionesSearch($search){
		$query = $this->db->query("select 
	        							operaciones.id as id, 
	        							operaciones.nombre as nombre
        							from 
        								operaciones
									where 
										operaciones.estado = 0
									and									
										operaciones.nombre LIKE '%".$search."%'
									order by
										operaciones.id desc");
		return $query->result();

	}
	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										operaciones.id,
										operaciones.nombre
									from
										operaciones
									where
										operaciones.estado = 0
									and
										operaciones.nombre = '".$str."'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantOperaciones(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        operaciones 
                                    where 
                                        operaciones.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>