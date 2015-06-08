<?php
class ProductosCRUD extends CI_Model {

    function ProductosCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getProductos()
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							productos.id as id, 
	        							productos.nombre as nombre, 
	        							productos.id_categoria as id_categoria, 
	        							categorias.nombre as categoria,
	        							productos.precio as precio, 
        								productos.stock as stock, 
        								productos.stock_min as stock_min, 
        								productos.stock_max as stock_max 
        							from 
        								productos 
									inner join 
										categorias on categorias.id = productos.id_categoria 
									where 
										productos.estado = 0
									order by
										productos.id");
		return $query->result();
    }

    function getXProductos($desde_row,$cant_rows){
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							productos.id as id, 
	        							productos.nombre as nombre, 
	        							productos.id_categoria as id_categoria, 
	        							categorias.nombre as categoria,
	        							productos.precio as precio, 
        								productos.stock as stock, 
        								productos.stock_min as stock_min, 
        								productos.stock_max as stock_max 
        							from 
        								productos 
									inner join 
										categorias on categorias.id = productos.id_categoria 
									where 
										productos.estado = 0
									order by
										productos.id
									limit
										".$desde_row.",".$cant_rows);
		return $query->result();
    }

    function getDiezProductos($nroPagina=0)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select 
	        							productos.id as id, 
	        							productos.nombre as nombre, 
	        							productos.id_categoria as id_categoria, 
	        							categorias.nombre as categoria,
	        							productos.precio as precio, 
        								productos.stock as stock, 
        								productos.stock_min as stock_min, 
        								productos.stock_max as stock_max 
        							from 
        								productos 
									inner join 
										categorias on categorias.id = productos.id_categoria 
									where 
										productos.estado = 0
									order by
										productos.id
									limit
										".$nroPagina.",10");
		return $query->result();
    }
//
    function getProdByCat($idCategoria){
    	$query = $this->db->query("select 
	        							productos.id as id, 
	        							productos.nombre as nombre
        							from 
        								productos 
									inner join 
										categorias on categorias.id = productos.id_categoria 
									where 
										productos.estado = 0
									and
										categorias.id = ".$idCategoria."
									order by
										productos.id");
		return $query->result();

    }
    function addProducto($nombre, $precio, $id_categoria, $stock, $stock_min, $stock_max){
    	$query= $this->db->query("insert into 
    								productos (
    									nombre, 
    									id_categoria, 
    									precio, 
    									stock, 
    									stock_min, 
    									stock_max) 
    								values (
    									'".$nombre."', 
    									".$id_categoria.", 
    									'".$precio."',  
    									".$stock.",  
    									".$stock_min.", 
    									".$stock_max.")");
		return 0;

    }

    function getProducto($id_producto){
    	$query = $this->db->query("select 
	        							productos.id as id, 
	        							productos.nombre as nombre, 
	        							productos.id_categoria as id_categoria, 
	        							categorias.nombre as categoria,
	        							productos.precio as precio, 
        								productos.stock as stock, 
        								productos.stock_min as stock_min, 
        								productos.stock_max as stock_max 
        							from 
        								productos 
									inner join 
										categorias on categorias.id = productos.id_categoria 
									where 
										productos.estado = 0
									and
										productos.id = ".$id_producto);
		return $query->result();

    }

    function actualizarStockProd($stock_nuevo, $idProducto){
    	$query= $this->db->query("update 
										productos 
									set 
										stock = ".$stock_nuevo."
									where 
										id = ".$idProducto);
		return 0;
    }
	function editProducto($idProducto,$nombre, $precio, $id_categoria, $stock, $stock_min, $stock_max){
		$query= $this->db->query("update 
										productos 
									set 
										nombre = '".$nombre."', 
										id_categoria = ".$id_categoria.", 
										precio = ".$precio.", 
										stock = ".$stock.", 
										stock_min = ".$stock_min.", 
										stock_max = ".$stock_max." 
									where 
										id = ".$idProducto);
		return 0;
	}

	function eliminarProducto($idProducto){
		$query= $this->db->query("update 
										productos 
									set 
										estado = 1
									where 
										id = ".$idProducto);
		return 0;
	}

	/*PAGINATION FUNCTIONS*/
	function getCantProductos(){

		$query= $this->db->query("select 
									count(*) as numrows
								from 
    								productos 
								inner join 
									categorias on categorias.id = productos.id_categoria 
								where 
									productos.estado = 0
								order by
									productos.id");
		if ($query->num_rows() == 0)
            return '0';

        $row = $query->row();
        return $row->numrows;
	}


	/**/
	
}
?>