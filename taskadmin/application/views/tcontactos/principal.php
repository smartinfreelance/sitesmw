<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">TContactos</li>
		</ul>
		<?php echo anchor(
							'tcontactos/formAddTContacto',
							"Agregar Tipo de Contacto", 
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
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($tcontactos as $tc){
			?>
				<tr>
					<td>
			<?php				
					echo $tc->id;
			?>
					</td>
					<td>
			<?php
					echo $tc->nombre;
			?>
					</td>
					<td>
			<?php
					echo anchor("tcontactos/formEditTContacto/".$tc->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("tcontactos/formDeleteTContacto/".$tc->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar TContacto")); 
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