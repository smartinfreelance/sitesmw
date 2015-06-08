<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Tasks</li>
		</ul>
		<?php echo anchor(
							'tasks/formAddTask',
							"Agregar Task", 
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
			if(count($tasks) > 0){
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
							Demora
						</th>
						<th>
							Demora Actual
						</th>
						<th>
							Proyecto
						</th>
						<th>
							Tipo
						</th>
						<th>
							Estado
						</th>
						<th>
							Asignado
						</th>				
						<th>
							Acciones
						</th>				
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($tasks as $t){
				?>
					<tr>
						<td>
				<?php				
						echo $t->id;
				?>
						</td>
						<td>
				<?php
						echo $t->nombre;
				?>
						</td>
						<td>
				<?php
						echo $t->demora;
				?>
						</td>
						<td>
				<?php
						echo $t->demora_actual;
				?>
						</td>
						<td>
				<?php
						echo $t->nombre_proyecto;
				?>
						</td>
						<td>
				<?php
						echo $t->tipo_task;
				?>
						</td>
						<td>
				<?php
						echo $t->estado_nombre;
				?>
						</td>
						<td>
				<?php
						echo $t->nombre_asignado." ".$t->apellido_asignado;
				?>
						<td>
				<?php
						echo anchor("tasks/formEditTask/".$t->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("tasks/formDeleteTask/".$t->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Task")); 
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