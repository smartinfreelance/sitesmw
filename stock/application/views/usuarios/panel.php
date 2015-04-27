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
	foreach($usuarios as $u){
		echo $u->id;
		echo " - ";
		echo $u->usuario;
		echo " - ";
		echo $u->nombre;
		echo " - ";
		echo $u->apellido;
		echo " - ";
		echo $u->rol;
		echo " - ";
		echo $u->dni;
		echo " - ";
		echo $u->fecha_nac;
		echo " - ";
		echo $u->mail;
		echo " - ";
		echo anchor("productos/editUsuario/".$u->id, 'Editar Usuario'); 
		echo " - ";
		echo anchor("productos/eliminarUsuario/".$u->id, 'Eliminar Usuario'); 
		echo "<br />";
	}
?>