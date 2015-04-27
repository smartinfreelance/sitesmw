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

    function addCategoria($nombre){
        $query= $this->db->query("insert into 
                                    categorias (
                                        nombre) 
                                    values (
                                        '".$nombre."')");
        return 0;

    }

    function getCategoria($id_categoria){
        $query = $this->db->query("select 
                                        categorias.id as id, 
                                        categorias.nombre as nombre
                                    from 
                                        categorias
                                    where 
                                        categorias.estado = 0
                                    and
                                        categorias.id = ".$id_categoria);
        return $query->result();

    }
    function editCategoria($idRol,$nombre){
        $query= $this->db->query("update 
                                        categorias
                                    set 
                                        nombre = '".$nombre."'
                                    where 
                                        id = ".$idRol);
        return 0;
    }

    function eliminarCategoria($idCategoria){
        $query= $this->db->query("update 
                                        categorias
                                    set 
                                        estado = 1
                                    where 
                                        id = ".$idCategoria);
        return 0;
    }
	
}
?>