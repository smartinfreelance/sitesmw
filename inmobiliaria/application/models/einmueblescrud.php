<?php
class EInmueblesCRUD extends CI_Model {

    function EInmueblesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getEInmuebles()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							calificaciones.id as id, 
	        							calificaciones.nombre as nombre
        							from 
        								calificaciones 
									where 
										calificaciones.estado = 0
									order by
										calificaciones.id desc");
		return $query->result();
    }

    function getXEInmuebles($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							calificaciones.id as id, 
	        							calificaciones.nombre as nombre
        							from 
        								calificaciones 
									where 
										calificaciones.estado = 0
									order by
										calificaciones.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addEInmueble($nombre){
    	$query= $this->db->query("insert into 
    								calificaciones (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getEInmueble($id_einmuebles){
    	$query = $this->db->query("select 
	        							calificaciones.id as id, 
	        							calificaciones.nombre as nombre
        							from 
        								calificaciones
									where 
										calificaciones.estado = 0
									and
										calificaciones.id = ".$id_einmuebles);
		return $query->result();

    }
	function editEInmueble($id_einmuebles,$nombre){
		$query= $this->db->query("update 
										calificaciones
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_einmuebles);
		return 0;
	}

	function deleteEInmueble($id_einmuebles){
		$query= $this->db->query("update 
										calificaciones
									set 
										estado = 1
									where 
										id = ".$id_einmuebles);
		return 0;
	}

	function searchEInmueble($search){
		$query = $this->db->query("select 
	        							calificaciones.id as id, 
	        							calificaciones.nombre as nombre
        							from 
        								calificaciones
									where 
										calificaciones.estado = 0
									and									
										calificaciones.nombre LIKE '%".$search."%'
									order by
										calificaciones.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										calificaciones.id,
										calificaciones.nombre
									from
										calificaciones
									where
										calificaciones.estado = 0
									and
										calificaciones.nombre = '".$str."'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantEInmuebles(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        calificaciones 
                                    where 
                                        calificaciones.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>