<?php
class NovedadesCRUD extends CI_Model {

    function NovedadesCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getNovedades()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							novedades.id as id, 
	        							novedades.descripcion as descripcion,
	        							novedades.articulo as articulo
        							from 
        								novedades 
									where 
										novedades.estado = 0
									order by
										novedades.id desc");
		return $query->result();
    }

    function getXNovedades($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							novedades.id as id, 
	        							novedades.descripcion as descripcion,
	        							novedades.articulo as articulo
        							from 
        								novedades 
									where 
										novedades.estado = 0
									order by
										novedades.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addNovedad($descripcion,$articulo){
    	$query= $this->db->query("insert into 
    								novedades (
    									descripcion,
    									articulo) 
    								values (
    									'".$descripcion."',
    									'".$articulo."')");
		return 0;

    }

    function getNovedad($id_novedad){
    	$query = $this->db->query("select 
	        							novedades.id as id, 
	        							novedades.descripcion as descripcion,
	        							novedades.articulo as articulo
        							from 
        								novedades
									where 
										novedades.estado = 0
									and
										novedades.id = ".$id_novedad);
		return $query->result();

    }

	function editNovedad($id_novedad,$descripcion,$articulo){
		$query= $this->db->query("update 
										novedades
									set 
										descripcion = '".$descripcion."',
    									articulo = '".$articulo."'
									where 
										id = ".$id_novedad);
		return 0;
	}

	function deleteNovedad($id_novedad){
		$query= $this->db->query("update 
										novedades
									set 
										estado = 1
									where 
										id = ".$id_novedad);
		return 0;
	}

	function searchNovedad($search){
		$query = $this->db->query("select 
	        							novedades.id as id, 
	        							novedades.descripcion as descripcion,
	        							novedades.articulo as articulo
        							from 
        								novedades
									where 
										novedades.estado = 0
									and									
										novedades.nombre LIKE '%".$search."%'
									order by
										novedades.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										novedades.id,
										novedades.nombre
									from
										novedades
									where
										novedades.estado = 0
									and
										novedades.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantNovedades(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        novedades 
                                    where 
                                        novedades.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

    function addInmoAmb($id_inmueble,$id_novedad){
    	$query= $this->db->query("insert into 
    								inmuebles_novedades (
    									id_inmueble,
    									id_novedad) 
    								values (
    									".$id_inmueble.",
    									".$id_novedad.")");
		return 0;
    }
	
}
?>