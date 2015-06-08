<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Estados</li>
		</ul>
		<?php echo anchor(
							'estados/formAddEstado',
							"Agregar Estado", 
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
			if(count($estados) > 0){
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
					foreach($estados as $e){
				?>
					<tr>
						<td>
				<?php				
						echo $e->id;
				?>
						</td>
						<td>
				<?php
						echo $e->nombre;
				?>
						</td>
						<td>
				<?php
						echo anchor("estados/formEditEstado/".$e->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("estados/formDeleteEstado/".$e->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Estado")); 
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