<?php
class MovimientosCRUD extends CI_Model {

    function MovimientosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getMovimientos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
        								movimientos.id as id, 
        								movimientos.tipo as tipo
        							from 
        								movimientos 
        							where 
        								movimientos.estado = 0");
		return $query->result();
    }
    function getXMovimientos($desde_row,$cant_rows)
    {
        /*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
                                        movimientos.id as id, 
                                        movimientos.tipo as tipo
                                    from 
                                        movimientos 
                                    where 
                                        movimientos.estado = 0
                                    limit
                                        ".$desde_row.",".$cant_rows);
        return $query->result();
    }

    function getDiezMovimientos($nroPagina=0)
    {
        /*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
                                        movimientos.id as id, 
                                        movimientos.tipo as tipo
                                    from 
                                        movimientos 
                                    where 
                                        movimientos.estado = 0
                                    limit
                                        ".$nroPagina.",10");
        return $query->result();
    }

    function addMovimiento($tipo,$descripcion){
        $query= $this->db->query("insert into 
                                    movimientos (
                                        tipo,
                                        descripcion) 
                                    values (
                                        '".$tipo."',
                                        '".$descripcion."')");
        return $this->db->insert_id();

    }

    function addMovProd($id_mov, $id_prod,$cant){
        $query= $this->db->query("insert into 
                                    mov_prod (
                                        id_movimiento,
                                        id_producto,
                                        cantidad) 
                                    values (
                                        ".$id_mov.",
                                        ".$id_prod.",
                                        '".$cant."')");
        return $this->db->insert_id();

    }

    function getMovimiento($id_movimiento){
        $query = $this->db->query("select 
                                        movimientos.id as id, 
                                        movimientos.tipo as tipo
                                    from 
                                        movimientos
                                    where 
                                        movimientos.estado = 0
                                    and
                                        movimientos.id = ".$id_movimiento);
        return $query->result();

    }
    function editMovimiento($id,$tipo){
        $query= $this->db->query("update 
                                        movimientos
                                    set 
                                        tipo = '".$tipo."'
                                    where 
                                        id = ".$id);
        return 0;
    }

    function eliminarMovimiento($idMovimiento){
        $query= $this->db->query("update 
                                        movimientos
                                    set 
                                        estado = 1
                                    where 
                                        id = ".$idMovimiento);
        return 0;
    }

    /*PAGINATION FUNCTIONS*/
    function getCantMovimientos(){

        $query= $this->db->query("select 
                                    count(*) as numrows
                                from 
                                        movimientos 
                                    where 
                                        movimientos.estado = 0");
        if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
    }


    /**/
	
}
?>