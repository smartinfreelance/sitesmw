<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Roles</li>
		</ul>
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
	</div>
</div>