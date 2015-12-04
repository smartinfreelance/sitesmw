<?php
class gastosCRUD extends CI_Model {

    function gastosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addGasto($id_categoria, $nombre, $costo_real, $costo_est_bajo, $costo_est_alto)
	{
        $query = $this->db->query("insert into
                                        gastos
                                            (id_categoria, nombre, costo_real, costo_est_bajo, costo_est_alto)
                                    values
                                            (".$id_categoria.", '".$nombre."', ".$costo_real.", ".$costo_est_bajo.", ".$costo_est_alto.")");
		return 0;
    }
    function editGasto($id, $id_categoria, $nombre, $costo_real, $costo_est_bajo, $costo_est_alto)
    {
        $query = $this->db->query("update
                                        gastos
                                    set
                                        id_categoria = ".$id_categoria.",
                                        nombre = '".$nombre."', 
                                        costo_real = ".$costo_real.", 
                                        costo_est_bajo = ".$costo_est_bajo.", 
                                        costo_est_alto = ".$costo_est_alto.", 
                                    where
                                        id = ".$id);

        return $query->result();
    }

    function getGasto($id){
        $query = $this->db->query("select
                                        gastos.id_categoria, 
                                        categorias_gastos.nombre as nombre_categoria
                                        gastos.nombre, 
                                        gastos.costo_real, 
                                        gastos.costo_est_bajo, 
                                        gastos.costo_est_alto,
                                    from
                                        gastos
                                    inner join
                                        categorias_gastos on categorias_gastos.id = gastos.id_categoria
                                    where
                                        id = ".$id."
                                    and
                                        estado = 0");

        return $query->result();
    }

    function getAllGastos(){
        $query = $this->db->query("select
                                        gastos.id_categoria, 
                                        categorias_gastos.nombre as nombre_categoria
                                        gastos.nombre, 
                                        gastos.costo_real, 
                                        gastos.costo_est_bajo, 
                                        gastos.costo_est_alto,
                                    from
                                        gastos
                                    inner join
                                        categorias_gastos on categorias_gastos.id = gastos.id_categoria
                                    where
                                        estado = 0");

        return $query->result();
    }

    function deleteGasto($id){
        $query = $this->db->query("update
                                        gastos
                                    set
                                        estado = 1
                                    where
                                        id = ".$id);

        return $query->result();
    }
        
}
?>