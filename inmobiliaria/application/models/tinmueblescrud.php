<?php
class TInmueblesCRUD extends CI_Model {

    function TInmueblesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTInmuebles()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							tipos_inmuebles.id as id, 
	        							tipos_inmuebles.nombre as nombre
        							from 
        								tipos_inmuebles 
									where 
										tipos_inmuebles.estado = 0
									order by
										tipos_inmuebles.id desc");
		return $query->result();
    }

    function getXTInmuebles($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							tipos_inmuebles.id as id, 
	        							tipos_inmuebles.nombre as nombre
        							from 
        								tipos_inmuebles 
									where 
										tipos_inmuebles.estado = 0
									order by
										tipos_inmuebles.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }

    function getTInmueblesToSearch(){
    	$query = $this->db->query("select
										tipos_inmuebles.id as id,
										tipos_inmuebles.nombre as nombre
									from
										tipos_inmuebles
									inner join
										inmuebles
									on
										inmuebles.id_tipo = tipos_inmuebles.id
									where
										inmuebles.estado = 0
									group by
										tipos_inmuebles.id");
		return $query->result();
    }
//
    function addTInmueble($nombre){
    	$query= $this->db->query("insert into 
    								tipos_inmuebles (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getTInmueble($id_tinmuebles){
    	$query = $this->db->query("select 
	        							tipos_inmuebles.id as id, 
	        							tipos_inmuebles.nombre as nombre
        							from 
        								tipos_inmuebles
									where 
										tipos_inmuebles.estado = 0
									and
										tipos_inmuebles.id = ".$id_tinmuebles);
		return $query->result();

    }
	function editTInmueble($id_tinmuebles,$nombre){
		$query= $this->db->query("update 
										tipos_inmuebles
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_tinmuebles);
		return 0;
	}

	function deleteTInmueble($id_tinmuebles){
		$query= $this->db->query("update 
										tipos_inmuebles
									set 
										estado = 1
									where 
										id = ".$id_tinmuebles);
		return 0;
	}

	function searchTInmueble($search){
		$query = $this->db->query("select 
	        							tipos_inmuebles.id as id, 
	        							tipos_inmuebles.nombre as nombre
        							from 
        								tipos_inmuebles
									where 
										tipos_inmuebles.estado = 0
									and									
										tipos_inmuebles.nombre LIKE '%".$search."%'
									order by
										tipos_inmuebles.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										tipos_inmuebles.id,
										tipos_inmuebles.nombre
									from
										tipos_inmuebles
									where
										tipos_inmuebles.estado = 0
									and
										tipos_inmuebles.nombre = '".$str."'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantTInmuebles(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        tipos_inmuebles 
                                    where 
                                        tipos_inmuebles.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

	
}
?>