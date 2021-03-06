<?php
class TTasksCRUD extends CI_Model {

    function TTasksCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getTTasks()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							ttasks.id as id, 
	        							ttasks.nombre as nombre
        							from 
        								ttasks 
									where 
										ttasks.estado = 0
									order by
										ttasks.id asc");
		return $query->result();
    }

	function getXTTasks($desde,$cuantos)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							ttasks.id as id, 
	        							ttasks.nombre as nombre
        							from 
        								ttasks 
									where 
										ttasks.estado = 0
									order by
										ttasks.id desc
									limit
                                        ".$desde.",".$cuantos." ");
		return $query->result();
    }    
//
    function addTTask($nombre){
    	$query= $this->db->query("insert into 
    								ttasks (
    									nombre) 
    								values (
    									'".$nombre."')");
		return 0;

    }

    function getTTask($id_ttask){
    	$query = $this->db->query("select 
	        							ttasks.id as id, 
	        							ttasks.nombre as nombre
        							from 
        								ttasks
									where 
										ttasks.estado = 0
									and
										ttasks.id = ".$id_ttask);
		return $query->result();

    }
	function editTTask($id_ttask,$nombre){
		$query= $this->db->query("update 
										ttasks
									set 
										nombre = '".$nombre."'
									where 
										id = ".$id_ttask);
		return 0;
	}

	function deleteTTask($id_ttask){
		$query= $this->db->query("update 
										ttasks
									set 
										estado = 1
									where 
										id = ".$id_ttask);
		return 0;
	}

	function searchTTask($search){
		$query = $this->db->query("select 
	        							ttasks.id as id, 
	        							ttasks.nombre as nombre
        							from 
        								ttasks
									where 
										ttasks.estado = 0
									and									
										ttasks.nombre LIKE '%".$search."%'
									order by
										ttasks.id desc");
		return $query->result();
	}

	//FUNCTIONES DE VALIDACION//

	function existeNombre($str){
		$query = $this->db->query("select 
										ttasks.id,
										ttasks.nombre
									from
										ttasks
									where
										ttasks.estado = 0
									and
										ttasks.nombre = '".$str."'");
		return $query->result();

	}

	/*PAGINATION FUNCTIONS*/
    function getCantTTasks(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        ttasks 
                                    where 
                                        ttasks.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }		

	
}
?>