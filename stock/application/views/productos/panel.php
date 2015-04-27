<?php
	echo anchor("login/login/intenta_desloggear", 'Desloguearse');
?>
<br />
<?php 
	echo anchor("productos/addProducto", 'Agregar Producto'); 
?>
<br />
<?php 
	echo anchor("productos/index", 'Productos'); 
?>
<br />
<?php
	foreach($productos as $p){
		echo $p->id;
		echo " - ";
		echo $p->nombre;
		echo " - ";
		echo $p->id_categoria;
		echo " - ";
		echo $p->categoria;
		echo " - ";
		echo $p->precio;
		echo " - ";
		if($p->stock > $p->stock_min){
			if($p->stock > $p->stock_max){
				echo "Tenemos de más.";
			}else{
				echo "Tenemos suficiente";
			}
		}else if($p->stock < $p->stock_min){
			echo "Tenemos faltante";
		}else{
			echo "Tenemos el stock minimo";
		}
		echo " - ";
		echo $p->stock;
		echo " - ";
		echo $p->stock_min;
		echo " - ";
		echo $p->stock_max;
		echo " - ";
		echo anchor("productos/editProducto/".$p->id, 'Editar Producto'); 
		echo " - ";
		echo anchor("productos/eliminarProducto/".$p->id, 'Eliminar Producto'); 
		echo "<br />";
	}
?>