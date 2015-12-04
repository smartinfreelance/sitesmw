<?php
class presupuestosCRUD extends CI_Model {

    function presupuestosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addPresupuesto($nombre, $monto_estimado, $monto_real, $fecha_inicio, $fecha_fin, $actual)
	{
        $query = $this->db->query("insert into
                                        presupuestos
                                            (nombre, monto_estimado, monto_real, fecha_inicio, fecha_fin, actual)
                                    values
                                            ('".$nombre."', ".$monto_estimado.", ".$monto_real.", '".$fecha_inicio."', '".$fecha_fin."', ".$actual.")");
		return 0;
    }
    function editPresupuesto($id,$nombre, $monto_estimado, $monto_real, $fecha_inicio, $fecha_fin, $actual){
        $query = $this->db->query("update
                                        presupuestos
                                    set
                                        presupuestos.nombre = '".$nombre."',
                                        presupuestos.monto_estimado = ".$monto_estimado.", 
                                        presupuestos.monto_real = ".$monto_real.", 
                                        presupuestos.fecha_inicio = '".$fecha_inicio."', 
                                        presupuestos.fecha_fin = '".$fecha_fin."', 
                                        presupuestos.actual = ".$actual."
                                    where
                                        presupuestos.id = ".$id);

        return $query->result();
    }

    function getPresupuesto($id){
        $query = $this->db->query("select
                                        presupuestos.id,
                                        presupuestos.nombre, 
                                        presupuestos.monto_estimado, 
                                        presupuestos.monto_real, 
                                        presupuestos.fecha_inicio, 
                                        presupuestos.fecha_fin, 
                                        presupuestos.actual
                                    from
                                        presupuestos
                                    where
                                        presupuestos.id = ".$id."
                                    and
                                        presupuestos.estado = 0");

        return $query->result();
    }

    function getAllPresupuestos(){
        $query = $this->db->query("select
                                        presupuestos.nombre, 
                                        presupuestos.monto_estimado, 
                                        presupuestos.monto_real, 
                                        presupuestos.fecha_inicio, 
                                        presupuestos.fecha_fin, 
                                        presupuestos.actual
                                    from
                                        presupuestos
                                    where
                                        estado = 0");

        return $query->result();
    }

    function deletePresupuesto($id){
        $query = $this->db->query("update
                                        presupuestos
                                    set
                                        presupuestos.estado = 1
                                    where
                                        presupuestos.id = ".$id);

        return $query->result();
    }
    // Validation Functions

    function existeNombre($str){
        $query = $this->db->query("select 
                                        presupuestos.id,
                                        presupuestos.nombre
                                    from
                                        presupuestos
                                    where
                                        presupuestos.estado = 0
                                    and
                                        presupuestos.nombre = '".$str."'");
        return $query->result();

    }
        
}
?>