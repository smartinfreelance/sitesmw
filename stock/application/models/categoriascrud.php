<?php
class CategoriasCRUD extends CI_Model {

    function CategoriasCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getCategorias()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
        								categorias.id as id, 
        								categorias.nombre as nombre
        							from 
        								categorias 
        							where 
        								categorias.estado = 0");
		return $query->result();
    }
	
}
?>