<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Historiales</li>
		</ul>
		<?php echo anchor(
							'thistoriales/formAddTHistorial',
							"Agregar Historia", 
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
			if(count($thistoriales) > 0){
		?>		
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							#ID
						</th>
						<th>
							Log
						</th>
						<th>
							Tarea
						</th>
						<th>
							Usuario
						</th>
						<th>
							Estado
						</th>
						<th>
							Acciones
						</th>				
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($thistoriales as $th){
				?>
					<tr>
						<td>
				<?php				
						echo $th->id;
				?>
						</td>
						<td>
				<?php
						echo $th->log;
				?>
						</td>
						<td>
				<?php
						echo $th->task;
				?>
						</td>
						<td>
				<?php
						echo $th->nombre_usuario." ".$th->apellido_usuario;
				?>
						</td>
						<td>
				<?php
						echo $th->nombre_estado;
				?>
						</td>
						<td>
				<?php
						echo anchor("thistoriales/formEditTHistorial/".$th->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("thistoriales/formDeleteTHistorial/".$th->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar THistorial")); 
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