<?php
class rolesUsuariosCRUD extends CI_Model {

    function rolesUsuariosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addRolesUsuario($nombre)
	{
        $query = $this->db->query("insert into
                                        roles_usuarios
                                            (nombre)
                                    values
                                            ('".$nombre."')");
		return 0;
    }
    function editRolesUsuario($id,$nombre){
        $query = $this->db->query("update
                                        roles_usuarios
                                    set
                                        roles_usuarios.nombre = '".$nombre."'
                                    where
                                        roles_usuarios.id = ".$id);

        return $query->result();
    }

    function getRolesUsuario($id){
        $query = $this->db->query("select
                                        roles_usuarios.nombre
                                    from
                                        roles_usuarios
                                    where
                                        roles_usuarios.id = ".$id."
                                    and
                                        roles_usuarios.estado = 0");

        return $query->result();
    }

    function getAllRolesUsuarios(){
        $query = $this->db->query("select
                                        roles_usuarios.nombre
                                    from
                                        roles_usuarios
                                    where
                                        estado = 0");

        return $query->result();
    }

    function deleteRolesUsuario($id){
        $query = $this->db->query("update
                                        roles_usuarios
                                    set
                                        roles_usuarios.estado = 1
                                    where
                                        roles_usuarios.id = ".$id);

        return $query->result();
    }
        
}
?>