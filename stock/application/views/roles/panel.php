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
	foreach($roles as $r){
		echo $r->id;
		echo " - ";
		echo $r->nombre;
		echo " - ";
		echo anchor("roles/editRol/".$r->id, 'Editar Rol'); 
		echo " - ";
		echo anchor("roles/eliminarRol/".$r->id, 'Eliminar Rol'); 
		echo "<br />";
	}
?>