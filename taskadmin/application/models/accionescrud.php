<?php
class AccionesCRUD extends CI_Model {

    function AccionesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getAcciones()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
        								acciones.id,
										acciones.nombre
									from
										acciones
									where
										acciones.estado = 0
									order by
										acciones.id");
		return $query->result();
    }
	function getXAcciones($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
        								acciones.id,
										acciones.nombre
									from
										acciones
									where
										acciones.estado = 0
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }    
//
    function addAccion($nombre){
    	$query= $this->db->query("insert into 
    								acciones (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getAccion($id_accion){
    	$query = $this->db->query("select 
										acciones.id,
										acciones.nombre
									from
										acciones
									where
										acciones.estado = 0
									and
										acciones.id = ".$id_accion);
		return $query->result();

    }
	function editAccion($id_accion,$nombre){
		$query= $this->db->query("update 
										acciones
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_accion);
		return 0;
	}

	function deleteAccion($id_accion){
		$query= $this->db->query("update 
										acciones
									set 
										estado = 1
									where 
										id = ".$id_accion);
		return 0;
	}

	function searchAccion($search){
		$query = $this->db->query("select 
	        							acciones.id as id, 
	        							acciones.nombre as nombre
        							from 
        								acciones
									where 
										acciones.estado = 0
									and									
										acciones.nombre LIKE '%".$search."%'");
		return $query->result();
	}

	/*PAGINATION FUNCTIONS*/
    function getCantAcciones(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        acciones 
                                    where 
                                        acciones.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }


    /**/

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										acciones.id,
										acciones.nombre
									from
										acciones
									where
										acciones.estado = 0
									and
										acciones.nombre = '".$str."'");
		return $query->result();

	}
}
?>