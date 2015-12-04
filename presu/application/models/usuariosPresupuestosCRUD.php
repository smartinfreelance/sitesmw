<?php
class usuariosPresupuestosCRUD extends CI_Model {

    function usuariosPresupuestosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addUsuarioPresupuesto($id_usuario, $id_presupuesto)
	{
        $query = $this->db->query("insert into
                                        usuarios_presupuestos
                                            (id_usuario, id_presupuesto)
                                    values
                                            (".$id_usuario.", ".$id_presupuesto.")");
		return 0;
    }
    function editUsuarioPresupuesto($id, $id_usuario, $id_presupuesto)
    {
        $query = $this->db->query("update
                                        usuarios_presupuestos
                                    set
                                        id_usuario = ".$id_usuario.", 
                                        id_presupuesto = ".$id_presupuesto."
                                    where
                                        id = ".$id);

        return $query->result();
    }

    function getUsuarioPresupuesto($id){
        $query = $this->db->query("select
                                        usuarios_presupuestos.id_usuario,
                                        usuarios.nombre as nombre_usuario,
                                        usuarios.apellido as apellido_usuario,
                                        usuarios.usuario as usuario_usuario,
                                        usuarios_presupuestos.id_presupuesto, 
                                        presupuestos.nombre as nombre_presupuesto 
                                    from
                                        usuarios_presupuestos
                                    inner join
                                        usuarios on usuarios.id = usuarios_presupuestos.id_usuario
                                    inner join
                                        presupuestos on presupuestos.id = usuarios_presupuestos.id_presupuesto
                                    where
                                        id = ".$id."
                                    and
                                        estado = 0 ");

        return $query->result();
    }

    function getAllUsuariosPresupuestos(){
        $query = $this->db->query("select
                                        usuarios_presupuestos.id_usuario,
                                        usuarios.nombre as nombre_usuario,
                                        usuarios.apellido as apellido_usuario,
                                        usuarios.usuario as usuario_usuario,
                                        usuarios_presupuestos.id_presupuesto, 
                                        presupuestos.nombre as nombre_presupuesto 
                                    from
                                        usuarios_presupuestos
                                    inner join
                                        usuarios on usuarios.id = usuarios_presupuestos.id_usuario
                                    inner join
                                        presupuestos on presupuestos.id = usuarios_presupuestos.id_presupuesto
                                    where
                                        estado = 0 ");

        return $query->result();
    }

    function deleteUsuarioPresupuesto($id){
        $query = $this->db->query("update
                                        usuarios_presupuestos
                                    set
                                        estado = 1
                                    where
                                        id = ".$id);

        return $query->result();
    }
        
}
?>