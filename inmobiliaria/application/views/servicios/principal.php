<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Servicios</li>
		</ul>
		<?php echo anchor(
							'servicios/formAddServicio',
							"Agregar Servicio", 
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
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($servicios as $tc){
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
					echo anchor("servicios/formEditServicio/".$tc->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("servicios/formDeleteServicio/".$tc->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Servicio")); 
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