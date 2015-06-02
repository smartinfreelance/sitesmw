<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">TTasks</li>
		</ul>
		<?php echo anchor(
							'ttasks/formAddTTask',
							"Agregar TTask", 
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
		<?php
			if(count($ttasks) > 0){
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
					foreach($ttasks as $tt){
				?>
					<tr>
						<td>
				<?php				
						echo $tt->id;
				?>
						</td>
						<td>
				<?php
						echo $tt->nombre;
				?>
						</td>
						<td>
				<?php
						echo anchor("ttasks/formEditTTask/".$tt->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("ttasks/formDeleteTTask/".$tt->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar TTask")); 
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