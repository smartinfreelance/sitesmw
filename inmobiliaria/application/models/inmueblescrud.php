<?php
class InmueblesCRUD extends CI_Model {

    function InmueblesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getInmuebles()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							inmuebles.id as id, 
	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.pos_lat as pos_lat,
	        							inmuebles.pos_lng as pos_lng,
	        							inmuebles.id_tipo as id_tipo,
	        							tipos_inmuebles.nombre as tipo_inmueble,
	        							inmuebles.id_operacion as id_operacion,
	        							operaciones.nombre as operacion,
	        							inmuebles.id_contacto as id_contacto,
	        							contactos.nombre as contacto
        							from 
        								inmuebles 
        							inner join
        								tipos_inmuebles 
        							on
        								tipos_inmuebles.id = inmuebles.id_tipo
        							inner join
        								contactos
        							on
        								contactos.id = inmuebles.id_contacto
        							inner join
        								operaciones
        							on
        								operaciones.id = inmuebles.id_operacion
									where 
										inmuebles.estado = 0
									order by
										inmuebles.id");
		return $query->result();
    }
//
    function addInmueble($direccion,$piso, $depto,$pos_lat, $pos_lng,$id_tipo, $id_operacion, $id_contacto){
    	$query= $this->db->query("insert into 
    								inmuebles (
    									direccion,
	        							piso,
	        							depto,
	        							descripcion,
	        							pos_lat,
	        							pos_lng,
	        							id_tipo,
	        							id_operacion,
	        							id_contacto
	        							) 
    								values (
    									'".$direccion."',
	        							".$piso.",
	        							'".$depto."',
	        							'".$descripcion."',
	        							'".$pos_lat."',
	        							'".$pos_lng."',
	        							".$id_tipo.",
	        							".$id_operacion.",
	        							".$id_contacto."
	        							)");
		return 0;

    }

    function getInmueble($id_inmueble){
    	$query = $this->db->query("select 
	        							inmuebles.id as id, 
	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.pos_lat as pos_lat,
	        							inmuebles.pos_lng as pos_lng,
	        							inmuebles.id_tipo as id_tipo,
	        							tipos_inmuebles.nombre as tipo_inmueble,
	        							inmuebles.id_operacion as id_operacion,
	        							operaciones.nombre as operacion,
	        							inmuebles.id_contacto as id_contacto,
	        							contactos.nombre as contacto
        							from 
        								inmuebles 
        							inner join
        								tipos_inmuebles 
        							on
        								tipos_inmuebles.id = inmuebles.id_tipo
        							inner join
        								contactos
        							on
        								contactos.id = inmuebles.id_contacto
        							inner join
        								operaciones
        							on
        								operaciones.id = inmuebles.id_operacion
									where 
										inmuebles.estado = 0
									and
										inmuebles.id = ".$id_inmueble);
		return $query->result();

    }
	function editInmueble($id_inmueble,$direccion,$piso, $depto,$pos_lat, $pos_lng,$id_tipo, $id_operacion, $id_contacto){
		$query= $this->db->query("update 
										inmuebles
									set 
										direccion = '".$direccion."',
	        							piso = ".$piso.",
	        							depto = '".$depto."',
	        							descripcion = '".$descripcion."',
	        							pos_lat = '".$pos_lat."',
	        							pos_lng = '".$pos_lng."',
	        							id_tipo = ".$id_tipo.",
	        							id_operacion = ".$id_operacion.",
	        							id_contacto = ".$id_contacto."
									where 
										id = ".$id_inmueble);
		return 0;
	}

	function deleteInmueble($id_inmueble){
		$query= $this->db->query("update 
										inmuebles
									set 
										estado = 1
									where 
										id = ".$id_inmueble);
		return 0;
	}

	
}
?>