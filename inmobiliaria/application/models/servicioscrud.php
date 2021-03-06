<?php
class ServiciosCRUD extends CI_Model {

    function ServiciosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getServicios()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							servicios.id as id, 
	        							servicios.nombre as nombre
        							from 
        								servicios 
									where 
										servicios.estado = 0
									order by
										servicios.id desc");
		return $query->result();
    }

    function getXServicios($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							servicios.id as id, 
	        							servicios.nombre as nombre
        							from 
        								servicios 
									where 
										servicios.estado = 0
									order by
										servicios.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addServicio($nombre){
    	$query= $this->db->query("insert into 
    								servicios (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getServicio($id_servicio){
    	$query = $this->db->query("select 
	        							servicios.id as id, 
	        							servicios.nombre as nombre
        							from 
        								servicios
									where 
										servicios.estado = 0
									and
										servicios.id = ".$id_servicio);
		return $query->result();

    }

    function getSerByInmo($id_inmueble){
    	$query = $this->db->query("select 
										inmuebles_servicios.id as id, 
										inmuebles_servicios.id_servicio as id_servicio,
										inmuebles_servicios.id_inmueble as id_inmueble,
										servicios.nombre as nombre_servicio
									from 
										inmuebles_servicios
									inner join
										servicios
									on
										inmuebles_servicios.id_servicio = servicios.id	
									where 
										inmuebles_servicios.estado = 0
									and
										servicios.estado = 0
									and
										inmuebles_servicios.id_inmueble =".$id_inmueble);
		return $query->result();

    }

    function removeSerByInmo($id_inmueble){
    	$query = $this->db->query("update 
										inmuebles_servicios
									set 
										estado = 1
									where 
										id_inmueble = ".$id_inmueble);
		return 0;
    }


	function editServicio($id_servicio,$nombre){
		$query= $this->db->query("update 
										servicios
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_servicio);
		return 0;
	}

	function deleteServicio($id_servicio){
		$query= $this->db->query("update 
										servicios
									set 
										estado = 1
									where 
										id = ".$id_servicio);
		return 0;
	}

	function searchServicio($search){
		$query = $this->db->query("select 
	        							servicios.id as id, 
	        							servicios.nombre as nombre
        							from 
        								servicios
									where 
										servicios.estado = 0
									and									
										servicios.nombre LIKE '%".$search."%'
									order by
										servicios.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										servicios.id,
										servicios.nombre
									from
										servicios
									where
										servicios.estado = 0
									and
										servicios.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantServicios(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        servicios 
                                    where 
                                        servicios.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

    function addInmoServ($id_inmueble,$id_servicio){
    	$query= $this->db->query("insert into 
    								inmuebles_servicios (
    									id_inmueble,
    									id_servicio) 
    								values (
    									".$id_inmueble.",
    									".$id_servicio.")");
		return 0;
    }
	
}
?>