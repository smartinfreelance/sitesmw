<?php
class InmueblesCRUD extends CI_Model {

    function InmueblesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getInmuebles()
	{

        $query = $this->db->query("select 
	        							inmuebles.id as id, 	        							
	        							inmuebles.id_provincia as id_provincia, 
	        							provincias.nombre as nombre_provincia, 	        							
	        							inmuebles.id_departamento as id_departamento, 
	        							departamentos.nombre as nombre_departamento, 	        							
	        							inmuebles.id_localidad as id_localidad, 
	        							localidades.nombre as nombre_localidad,
	        							
	        							inmuebles.calificacion as estado_inmueble, 
	        							calificaciones.nombre as nombre_einmueble,
	        							inmuebles.superficie_cubierta as superficie_cubierta,
	        							inmuebles.superficie_descubierta as superficie_descubierta,
	        							inmuebles.antiguedad as antiguedad,
	        							
	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.moneda as moneda,
	        							inmuebles.precio as precio,
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
        								provincias 
        							on
        								provincias.id = inmuebles.id_provincia
        							inner join
        								departamentos 
        							on
        								departamentos.id = inmuebles.id_departamento
        							inner join
        								localidades
        							on
        								localidades.id = inmuebles.id_localidad
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
        							inner join
        								calificaciones
        							on
        								calificaciones.id = inmuebles.calificacion
									where 
										inmuebles.estado = 0
									and
										tipos_inmuebles.estado = 0
									and
										contactos.estado = 0
									and
										operaciones.estado = 0
									and
										calificaciones.estado = 0
									order by 
										inmuebles.id desc");
		return $query->result();
    }

    function getInmueblesFEFiltro($search)
	{

        $query = $this->db->query("select 
	        							inmuebles.id as id, 	        							
	        							inmuebles.id_provincia as id_provincia, 
	        							provincias.nombre as nombre_provincia, 	        							
	        							inmuebles.id_departamento as id_departamento, 
	        							departamentos.nombre as nombre_departamento, 	        							
	        							inmuebles.id_localidad as id_localidad, 
	        							localidades.nombre as nombre_localidad,
	        							
	        							inmuebles.calificacion as estado_inmueble, 
	        							calificaciones.nombre as nombre_einmueble,
	        							inmuebles.superficie_cubierta as superficie_cubierta,
	        							inmuebles.superficie_descubierta as superficie_descubierta,
	        							inmuebles.antiguedad as antiguedad,
	        							
	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.moneda as moneda,
	        							inmuebles.precio as precio,
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
        								provincias 
        							on
        								provincias.id = inmuebles.id_provincia
        							inner join
        								departamentos 
        							on
        								departamentos.id = inmuebles.id_departamento
        							inner join
        								localidades
        							on
        								localidades.id = inmuebles.id_localidad
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
        							inner join
        								calificaciones
        							on
        								calificaciones.id = inmuebles.calificacion
									where 
										inmuebles.estado = 0
									and
										tipos_inmuebles.estado = 0
									and
										contactos.estado = 0
									and
										operaciones.estado = 0
									and
										calificaciones.estado = 0
									".$search."										
									order by 
										inmuebles.id desc");
		return $query->result();
    }

    function getXInmuebles($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							inmuebles.id as id, 
	        							inmuebles.id_provincia as id_provincia, 
	        							provincias.nombre as nombre_provincia, 	        							
	        							inmuebles.id_departamento as id_departamento, 
	        							departamentos.nombre as nombre_departamento, 	        							
	        							inmuebles.id_localidad as id_localidad, 
	        							localidades.nombre as nombre_localidad, 

	        							inmuebles.calificacion as estado_inmueble, 
	        							calificaciones.nombre as nombre_einmueble,
	        							inmuebles.superficie_cubierta as superficie_cubierta,
	        							inmuebles.superficie_descubierta as superficie_descubierta,
	        							inmuebles.antiguedad as antiguedad,

	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.moneda as moneda,
	        							inmuebles.precio as precio,
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
        								provincias 
        							on
        								provincias.id = inmuebles.id_provincia
        							inner join
        								departamentos 
        							on
        								departamentos.id = inmuebles.id_departamento
        							inner join
        								localidades
        							on
        								localidades.id = inmuebles.id_localidad
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
        							inner join
        								calificaciones
        							on
        								calificaciones.id = inmuebles.calificacion
									where 
										inmuebles.estado = 0
									and
										tipos_inmuebles.estado = 0
									and
										contactos.estado = 0
									and
										operaciones.estado = 0
									and
										calificaciones.estado = 0
									order by 
										inmuebles.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }

    function getXInmueblesBusqueda($desde,$cuantos,$search)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							inmuebles.id as id, 
	        							inmuebles.id_provincia as id_provincia, 
	        							provincias.nombre as nombre_provincia, 	        							
	        							inmuebles.id_departamento as id_departamento, 
	        							departamentos.nombre as nombre_departamento, 	        							
	        							inmuebles.id_localidad as id_localidad, 
	        							localidades.nombre as nombre_localidad, 

	        							inmuebles.calificacion as estado_inmueble, 
	        							calificaciones.nombre as nombre_einmueble,
	        							inmuebles.superficie_cubierta as superficie_cubierta,
	        							inmuebles.superficie_descubierta as superficie_descubierta,
	        							inmuebles.antiguedad as antiguedad,

	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.moneda as moneda,
	        							inmuebles.precio as precio,
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
        								provincias 
        							on
        								provincias.id = inmuebles.id_provincia
        							inner join
        								departamentos 
        							on
        								departamentos.id = inmuebles.id_departamento
        							inner join
        								localidades
        							on
        								localidades.id = inmuebles.id_localidad
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
        							inner join
        								calificaciones
        							on
        								calificaciones.id = inmuebles.calificacion
									where 
										inmuebles.estado = 0
									and
										tipos_inmuebles.estado = 0
									and
										contactos.estado = 0
									and
										operaciones.estado = 0
									and
										calificaciones.estado = 0
									".$search."
									order by 
										inmuebles.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addInmueble($id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$calificacion,$descripcion,$moneda,$precio,$pos_lat, $pos_lng,$id_tipo, $id_operacion, $id_contacto){
    	$query= $this->db->query("insert into 
    								inmuebles (
    									id_provincia,
    									id_departamento,
    									id_localidad,
    									direccion,
	        							piso,
	        							depto,
	        							calificacion,
	        							descripcion,
	        							moneda,
	        							precio,
	        							pos_lat,
	        							pos_lng,
	        							id_tipo,
	        							id_operacion,
	        							id_contacto
	        							) 
    								values (
    									".$id_provincia.",
    									".$id_departamento.",
    									".$id_localidad.",
    									'".$direccion."',
	        							".$piso.",
	        							'".$depto."',
	        							".$calificacion.",
	        							'".$descripcion."',
	        							'".$moneda."',
	        							'".$precio."',
	        							'".$pos_lat."',
	        							'".$pos_lng."',
	        							".$id_tipo.",
	        							".$id_operacion.",
	        							".$id_contacto."
	        							)");
		return $this->db->insert_id();

    }

    function getInmueble($id_inmueble){
    	$query = $this->db->query("select 
	        							inmuebles.id as id,
	        							inmuebles.id_provincia as id_provincia, 
	        							provincias.nombre as nombre_provincia, 	        							
	        							inmuebles.id_departamento as id_departamento, 
	        							departamentos.nombre as nombre_departamento, 	        							
	        							inmuebles.id_localidad as id_localidad, 
	        							localidades.nombre as nombre_localidad,

	        							inmuebles.calificacion as estado_inmueble, 
	        							calificaciones.nombre as nombre_einmueble,
	        							inmuebles.superficie_cubierta as superficie_cubierta,
	        							inmuebles.superficie_descubierta as superficie_descubierta,
	        							inmuebles.antiguedad as antiguedad,

	        							inmuebles.direccion as direccion,
	        							inmuebles.piso as piso,
	        							inmuebles.depto as depto,
	        							inmuebles.descripcion as descripcion,
	        							inmuebles.moneda as moneda,
	        							inmuebles.precio as precio,
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
        								provincias 
        							on
        								provincias.id = inmuebles.id_provincia
        							inner join
        								departamentos 
        							on
        								departamentos.id = inmuebles.id_departamento
        							inner join
        								localidades
        							on
        								localidades.id = inmuebles.id_localidad
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
        							inner join
        								calificaciones
        							on
        								calificaciones.id = inmuebles.calificacion
									where 
										inmuebles.estado = 0
									and
										tipos_inmuebles.estado = 0
									and
										contactos.estado = 0
									and
										operaciones.estado = 0
									and
										calificaciones.estado = 0
									and
										inmuebles.id = ".$id_inmueble);
		return $query->result();

    }
	function editInmueble($id_inmueble,$id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$descripcion,$moneda,$precio,$lat, $lng, $id_tinmueble, $id_operacion, $id_contacto){
		$query= $this->db->query("update 
										inmuebles
									set
										id_provincia = ".$id_provincia.",
										id_departamento = ".$id_departamento.",
										id_localidad = ".$id_localidad.", 
										direccion = '".$direccion."',
	        							piso = ".$piso.",
	        							depto = '".$depto."',
	        							descripcion = '".$descripcion."',
	        							moneda = '".$moneda."',
	        							precio = ".$precio.",
	        							pos_lat = '".$lat."',
	        							pos_lng = '".$lng."',
	        							id_tipo = ".$id_tinmueble.",
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

	/*PAGINATION FUNCTIONS*/
    function getCantInmuebles(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        inmuebles 
                                inner join
    									provincias 
    							on
    								provincias.id = inmuebles.id_provincia
    							inner join
    								departamentos 
    							on
    								departamentos.id = inmuebles.id_departamento
    							inner join
    								localidades
    							on
    								localidades.id = inmuebles.id_localidad
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
									tipos_inmuebles.estado = 0
								and
									contactos.estado = 0
								and
									operaciones.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

    function getCantInmueblesFEFiltro($search){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        inmuebles 
                                inner join
    									provincias 
    							on
    								provincias.id = inmuebles.id_provincia
    							inner join
    								departamentos 
    							on
    								departamentos.id = inmuebles.id_departamento
    							inner join
    								localidades
    							on
    								localidades.id = inmuebles.id_localidad
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
									tipos_inmuebles.estado = 0
								and
									contactos.estado = 0
								and
									operaciones.estado = 0
								".$search);
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	
	
}
?>