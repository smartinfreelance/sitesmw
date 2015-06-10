<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Ambientes</li>
		</ul>
		<?php echo anchor(
							'ambientes/formAddAmbiente',
							"Agregar Ambiente", 
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
				foreach($ambientes as $tc){
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
					echo anchor("ambientes/formEditAmbiente/".$tc->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("ambientes/formDeleteAmbiente/".$tc->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Ambiente")); 
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