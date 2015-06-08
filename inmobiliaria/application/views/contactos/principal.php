<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Contactos</li>
		</ul>
		<?php echo anchor(
							'contactos/formAddContacto',
							"Agregar Contacto", 
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
						Telefono
					</th>
					<th>
						Tipo
					</th>							
					<th>
						Mail
					</th>							
					<th>
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($contactos as $c){
			?>
				<tr>
					<td>
			<?php				
					echo $c->id;
			?>
					</td>
					<td>
			<?php
					echo html_entity_decode($c->nombre);
			?>
					</td>
					<td>
			<?php
					echo $c->telefono;
			?>
					</td>
					<td>
			<?php
					echo $c->tipo_contacto;
			?>
					</td>
					<td>
			<?php
					echo $c->mail;
			?>
					</td>
					<td>
			<?php
					echo anchor("contactos/formEditContacto/".$c->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("contactos/formDeleteContacto/".$c->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Contacto")); 
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