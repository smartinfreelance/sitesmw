<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Proyectos</li>
		</ul>
		<?php echo anchor(
							'proyectos/formAddProyecto',
							"Agregar Proyecto", 
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
			if(count($proyectos) > 0){
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
					foreach($proyectos as $p){
				?>
					<tr>
						<td>
				<?php				
						echo $p->id;
				?>
						</td>
						<td>
				<?php
						echo $p->nombre;
				?>
						</td>
						<td>
				<?php
						echo anchor("proyectos/formEditProyecto/".$p->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("proyectos/formDeleteProyecto/".$p->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Proyecto")); 
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