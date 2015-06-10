<?php
class FotosCRUD extends CI_Model {

    function FotosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getFotos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							fotos.id as id, 
	        							fotos.path as path,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where 
										fotos.estado = 0
									order by
										fotos.id desc");
		return $query->result();
    }

    function getXFotos($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							fotos.id as id, 
	        							fotos.path as path,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where 
										fotos.estado = 0
									order by
										fotos.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addFoto($path,$path_thumb,$id_inmueble){
    	$query= $this->db->query("insert into 
    								fotos (
    									path,
    									path_thumb,
    									id_inmueble) 
    								values (
    									'".$path."',
    									'".$path_thumb."',
    									".$id_inmueble.")");
		return 0;

    }

    function getFoto($id_foto){
    	$query = $this->db->query("select 
	        							fotos.id as id, 
	        							fotos.path as path,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where 
										fotos.estado = 0
									and
										fotos.id = ".$id_foto);
		return $query->result();

    }

    function getFotosByInmo($id_inmueble){
    	$query = $this->db->query("select 
	        							fotos.id as id, 
	        							fotos.path as path,
	        							fotos.path_thumb as path_thumb,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where 
										fotos.estado = 0
									and
										fotos.id_inmueble = ".$id_inmueble);
		return $query->result();

    }

	function editFoto($id_foto,$path){
		$query= $this->db->query("update 
										fotos
									set 
										path = '".$path."'
									where 
										id = ".$id_foto);
		return 0;
	}

	function deleteFoto($id_foto){
		$query= $this->db->query("update 
										fotos
									set 
										estado = 1
									where 
										id = ".$id_foto);
		return 0;
	}

	function deleteFotoByInmo($id_inmueble,$id_foto){
		$query= $this->db->query("update 
										fotos
									set 
										estado = 1
									where 
										id = ".$id_foto);
		return 0;
	}

	function searchFoto($search){
		$query = $this->db->query("select 
	        							fotos.id as id, 
	        							fotos.path as path,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where 
										fotos.estado = 0
									and									
										fotos.path LIKE '%".$search."%'
									order by
										fotos.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										fotos.id,
										fotos.path,
	        							fotos.id_inmueble as id_inmueble,
	        							inmuebles.direccion as direccion_inmueble
        							from 
        								fotos 
									inner join
										inmuebles 
									on
										inmuebles.id = fotos.id_inmueble
									where
										fotos.estado = 0
									and
										fotos.path = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantFotos(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        fotos 
                                    where 
                                        fotos.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	
	
}
?>