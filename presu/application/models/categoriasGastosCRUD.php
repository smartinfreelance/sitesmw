<?php
class categoriasGastosCRUD extends CI_Model {

    function categoriasGastosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addCategoriasGasto($nombre)
	{
        $query = $this->db->query("insert into
                                        categorias_gastos
                                            (nombre)
                                    values
                                            ('".$nombre."')");
		return 0;
    }
    function editCategoriasGasto($id, $nombre){
        $query = $this->db->query("update
                                        categorias_gastos
                                    set
                                        categorias_gastos.nombre = '".$nombre."'
                                    where
                                        categorias_gastos.id = ".$id);

        return $query->result();
    }

    function getCategoriasGasto($id){
        $query = $this->db->query("select
                                        categorias_gastos.nombre
                                    from
                                        categorias_gastos
                                    where
                                        categorias_gastos.id = ".$id."
                                    and
                                        categorias_gastos.estado = 0");

        return $query->result();
    }

    function getAllCategoriasGastos(){
        $query = $this->db->query("select
                                        categorias_gastos.nombre
                                    from
                                        categorias_gastos
                                    where
                                        estado = 0");

        return $query->result();
    }

    function deleteCategoriasGasto($id){
        $query = $this->db->query("update
                                        categorias_gastos
                                    set
                                        categorias_gastos.estado = 1
                                    where
                                        categorias_gastos.id = ".$id);

        return $query->result();
    }
        
}
?>