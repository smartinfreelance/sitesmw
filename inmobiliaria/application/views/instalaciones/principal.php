<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Instalaciones</li>
		</ul>
		<?php echo anchor(
							'instalaciones/formAddInstalacion',
							"Agregar Instalacion", 
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
				foreach($instalaciones as $tc){
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
					echo anchor("instalaciones/formEditInstalacion/".$tc->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("instalaciones/formDeleteInstalacion/".$tc->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Instalacion")); 
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