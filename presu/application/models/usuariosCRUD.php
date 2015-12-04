<?php
class usuariosCRUD extends CI_Model {

    function usuariosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addUsuario($id_rol, $nombre, $apellido, $fecha_nac, $usuario, $password)
	{
        $query = $this->db->query("insert into
                                        usuarios
                                            (id_rol, nombre, apellido, fecha_nac, usuario, password)
                                    values
                                            (".$id_rol.", '".$nombre."', '".$apellido."', '".$fecha_nac."', '"$usuario"', md5('".$password."'))");
		return 0;
    }
    function editUsuario($id,$id_rol, $nombre, $apellido, $fecha_nac, $usuario, $password)
    {
        $query = $this->db->query("update
                                        usuarios
                                    set
                                        id_rol = ".$id_rol.", 
                                        nombre = '".$nombre."', 
                                        apellido = '".$apellido."', 
                                        fecha_nac = '".$fecha_nac."', 
                                        usuario = '".$usuario."', 
                                        password = md5('".$password."')
                                    where
                                        id = ".$id);

        return $query->result();
    }

    function getUsuario($id){
        $query = $this->db->query("select
                                        usuarios.id_rol,
                                        roles_usuarios.nombre as nombre_rol, 
                                        usuarios.nombre, 
                                        usuarios.apellido, 
                                        usuarios.fecha_nac, 
                                        usuarios.usuario, 
                                        usuarios.password
                                    from
                                        usuarios
                                    inner join
                                        roles_usuarios on roles_usuarios.id = usuarios.id_rol
                                    where
                                        id = ".$id."
                                    and
                                        estado = 0 ");

        return $query->result();
    }

    function getAllUsuarios(){
        $query = $this->db->query("select
                                        usuarios.id_rol,
                                        roles_usuarios.nombre as nombre_rol, 
                                        usuarios.nombre, 
                                        usuarios.apellido, 
                                        usuarios.fecha_nac, 
                                        usuarios.usuario, 
                                        usuarios.password
                                    from
                                        usuarios
                                    inner join
                                        roles_usuarios on roles_usuarios.id = usuarios.id_rol
                                    where
                                        estado = 0");

        return $query->result();
    }

    function deleteUsuario($id){
        $query = $this->db->query("update
                                        usuarios
                                    set
                                        estado = 1
                                    where
                                        id = ".$id);

        return $query->result();
    }
        
}
?>