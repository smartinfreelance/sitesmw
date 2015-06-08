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
		<?php
			if($links!=""){
		?>
				<div class='container' align='center'>
					<ul class = 'breadcrumb'>
						<li>
							<?php echo $links; ?>
						</li>
					</ul>
				</div>
		<?php
			}
		?>
		<?php
			if(count($usuarios) > 0){
		?>		
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
							Usuario
						</th>
						<th>
							Mail
						</th>
						<th>
							Rol
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
						echo $u->nombre." ".$u->apellido;	
				?>
						</td>
						<td>
				<?php	
						echo $u->usuario;			
				?>
						</td>
						<td>
				<?php
						echo $u->mail;
				?>
						</td>
						<td>
				<?php
						echo $u->rol;
				?>
						</td>												
						<td>
				<?php
						echo anchor("usuarios/formEditUsuario/".$u->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("usuarios/formDeleteUsuario/".$u->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Usuario")); 
				?>
						</td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		<?php
			}else{
				echo "No hay registros.";
			}
		?>
	</div>
</div>