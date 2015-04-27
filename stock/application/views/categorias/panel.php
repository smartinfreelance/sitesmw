<?php
	echo anchor("login/login/intenta_desloggear", 'Desloguearse');
?>
<br />
<?php 
	echo anchor("productos/index", 'Productos'); 
	echo " - ";
	echo anchor("productos/addProducto", 'Agregar Producto'); 
?>
<br />
<?php 
	echo anchor("roles/index", 'Roles'); 
	echo " - ";
	echo anchor("roles/addRol", 'Agregar Rol'); 
?>
<br />
<?php 
	echo anchor("categorias/index", 'Categorias'); 
	echo " - ";
	echo anchor("categorias/addCategoria", 'Agregar Categoria'); 
?>
<br />
<?php
	foreach($categorias as $c){
		echo $c->id;
		echo " - ";
		echo $c->nombre;
		echo " - ";
		echo " - ";
		echo anchor("categorias/editCategoria/".$c->id, 'Editar Categoria'); 
		echo " - ";
		echo anchor("categorias/eliminarCategoria/".$c->id, 'Eliminar Categoria'); 
		echo "<br />";
	}
?>