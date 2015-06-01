<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Usuarios</li>
		</ul>
		<?php echo anchor(
							'usuarios/formAddUsuario',
							"Agregar Usuario", 
							array("class"=>'btn btn-success')); 
		?><br />
		<br />
		<!--<div class='container' align='center'>
			<ul class = 'breadcrumb'>
				<li>
					<?php echo $links; ?>
				</li>
			</ul>
		</div>-->
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						#ID
					</th>
					<th>
						Nombre
					</th>
					<th>
						Apellido
					</th>
					<th>
						Usuario
					</th>							
					<th>
						Rol
					</th>							
					<th>
						Mail
					</th>							
					<th>
						Fecha de Nacimiento
					</th>			
					<th>
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($usuarios as $u){
			?>
				<tr>
					<td>
			<?php				
					echo $u->id;
			?>
					</td>
					<td>
			<?php
					echo $u->nombre;
			?>
					</td>
					<td>
			<?php
					echo $u->apellido;
			?>
					</td>
					<td>
			<?php
					echo $u->usuario;
			?>
					</td>
					<td>
			<?php
					echo $u->rol;
			?>
					</td>
					<td>
			<?php
					echo $u->mail;
			?>
					</td>
					<td>
			<?php
					echo $u->fecha_nac;
			?>
					</td>					
					<td>
			<?php
					echo anchor("usuarios/editUsuario/".$u->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("usuarios/eliminarUsuario/".$u->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Usuario")); 
			?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>