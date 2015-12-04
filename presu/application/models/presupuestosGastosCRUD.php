<?php
class presupuestosGastosCRUD extends CI_Model {

    function presupuestosGastosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addPresupuestoGasto(id_presupuesto, id_gasto)
	{
        $query = $this->db->query("insert into
                                        presupuestos_gastos
                                            (id_presupuesto, id_gasto)
                                    values
                                        (".$id_presupuesto.", ".$id_gasto.")");
		return 0;
    }
    function editPresupuestoGasto($id, $id_categoria, $nombre, $costo_real, $costo_est_bajo, $costo_est_alto)
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

    function getPresupuestoGasto($id){
        $query = $this->db->query("select
                                        presupuestos_gastos.id_presupuesto, 
                                        presupuestos.nombre as nombre_presupuesto,
                                        presupuestos_gastos.id_gasto,
                                        gastos.nombre as nombre_gasto
                                    from
                                        presupuestos_gastos
                                    where
                                        id = 0
                                    select
                                        id_presupuesto, 
                                        id_gasto
                                    from
                                        presupuestos_gastos
                                    inner join
                                        presupuestos on presupuestos.id = presupuestos_gastos.id_presupuesto
                                    inner join
                                        gastos on gastos.id = presupuestos_gastos.id_gasto
                                    where
                                        presupuestos_gastos.id = ".$id."
                                    and
                                        estado = 0");

        return $query->result();
    }

    function getAllPresupuestosGastos(){
        $query = $this->db->query("select
                                        presupuestos_gastos.id_presupuesto, 
                                        presupuestos.nombre as nombre_presupuesto,
                                        presupuestos_gastos.id_gasto,
                                        gastos.nombre as nombre_gasto
                                    from
                                        presupuestos_gastos
                                    where
                                        id = 0
                                    select
                                        id_presupuesto, 
                                        id_gasto
                                    from
                                        presupuestos_gastos
                                    inner join
                                        presupuestos on presupuestos.id = presupuestos_gastos.id_presupuesto
                                    inner join
                                        gastos on gastos.id = presupuestos_gastos.id_gasto
                                    where
                                        presupuestos_gastos.estado = 0");

        return $query->result();
    }

    function deletePresupuestoGasto($id){
        $query = $this->db->query("update
                                        presupuestos_gastos
                                    set
                                        estado = 1
                                    where
                                        id = ".$id);

        return $query->result();
    }
        
}
?>