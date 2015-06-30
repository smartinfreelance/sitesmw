<?php
class EntradasCRUD extends CI_Model {

    function EntradasCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getEntradas()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							entradas_weblog.id as id, 
	        							entradas_weblog.descripcion as descripcion,
	        							entradas_weblog.articulo as articulo
        							from 
        								entradas_weblog 
									where 
										entradas_weblog.estado = 0
									order by
										entradas_weblog.id desc");
		return $query->result();
    }

    function getXEntradas($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							entradas_weblog.id as id, 
	        							entradas_weblog.descripcion as descripcion,
	        							entradas_weblog.articulo as articulo,
	        							entradas_weblog.imagen as imagen,
	        							entradas_weblog.imagen_thumb as imagen_thumb
        							from 
        								entradas_weblog 
									where 
										entradas_weblog.estado = 0
									order by
										entradas_weblog.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }
//
    function addEntrada($descripcion,$articulo,$imagen,$imagen_thumb){
    	$query= $this->db->query("insert into 
    								entradas_weblog (
    									descripcion,
    									articulo,
    									imagen,
    									imagen_thumb) 
    								values (
    									'".$descripcion."',
    									'".$articulo."',
    									'".$imagen."',
    									'".$imagen_thumb.")");
		return 0;

    }

    function getEntrada($id_entrada){
    	$query = $this->db->query("select 
	        							entradas_weblog.id as id, 
	        							entradas_weblog.descripcion as descripcion,
	        							entradas_weblog.imagen as imagen,
	        							entradas_weblog.imagen_thumb as imagen_thumb
        							from 
        								entradas_weblog
									where 
										entradas_weblog.estado = 0
									and
										entradas_weblog.id = ".$id_entrada);
		return $query->result();

    }

	function editEntrada($id_entrada,$descripcion,$articulo,$imagen,$imagen_thumb){
		$query= $this->db->query("update 
										entradas_weblog
									set 
										descripcion = '".$descripcion."',
    									articulo = '".$articulo."',
    									imagen = '".$imagen."',
    									imagen_thumb = '".$imagen_thumb."'
									where 
										id = ".$id_entrada);
		return 0;
	}

	function deleteEntrada($id_entrada){
		$query= $this->db->query("update 
										entradas_weblog
									set 
										estado = 1
									where 
										id = ".$id_entrada);
		return 0;
	}

	function searchEntrada($search){
		$query = $this->db->query("select 
	        							entradas_weblog.id as id, 
	        							entradas_weblog.descripcion as descripcion,
	        							entradas_weblog.articulo as articulo,
	        							entradas_weblog.imagen as imagen,
	        							entradas_weblog.imagen_thumb as imagen_thumb
        							from 
        								entradas_weblog
									where 
										entradas_weblog.estado = 0
									and									
										entradas_weblog.nombre LIKE '%".$search."%'
									order by
										entradas_weblog.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										entradas_weblog.id,
										entradas_weblog.nombre
									from
										entradas_weblog
									where
										entradas_weblog.estado = 0
									and
										entradas_weblog.nombre = '".$str."'");
		return $query->result();

	}
	
	/*PAGINATION FUNCTIONS*/
    function getCantEntradas(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        entradas_weblog 
                                    where 
                                        entradas_weblog.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }	

    function addInmoAmb($id_inmueble,$id_entrada){
    	$query= $this->db->query("insert into 
    								inmuebles_entradas (
    									id_inmueble,
    									id_entrada) 
    								values (
    									".$id_inmueble.",
    									".$id_entrada.")");
		return 0;
    }
	
}
?>