<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Comentarios</li>
		</ul>
		<?php echo anchor(
							'tcomentarios/formAddTComentario',
							"Agregar Comentario", 
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
			if(count($tcomentarios) > 0){
		?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							#ID
						</th>
						<th>
							Comentario
						</th>
						<th>
							Usuario
						</th>					
						<th>
							Tarea
						</th>
						<th>
							Acciones
						</th>				
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($tcomentarios as $tc){
				?>
					<tr>
						<td>
				<?php				
						echo $tc->id;
				?>
						</td>
						<td>
				<?php
						echo $tc->comentario;
				?>
						</td>
						<td>
				<?php
						echo $tc->nombre_usuario." ".$tc->apellido_usuario;
				?>
						</td>					
						<td>
				<?php
						echo $tc->nombre_task;
				?>
						</td>
						<td>
				<?php
						echo anchor("tcomentarios/formEditTComentario/".$tc->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("tcomentarios/formDeleteTComentario/".$tc->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar TComentario")); 
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