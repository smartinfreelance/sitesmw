<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Movimientos</li>
		</ul>
		<?php echo anchor(
					'movimientos/addMovimiento',
					"Agregar Movimiento", 
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
						Tipo
					</th>
					<th>
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
		<?php
			foreach($movimientos as $m){
		?>
				<tr>
					<td>
		<?php					
				echo $m->id;
		?>
				</td>
				<td>
		<?php
				echo $m->tipo;
		?>
				</td>
				<td>
		<?php
				echo anchor("movimientos/editMovimiento/".$m->id, '<i class="icon-edit"></i>'); 
				echo "&nbsp; &nbsp; &nbsp;";
				echo anchor("movimientos/eliminarMovimiento/".$m->id, '<i class="icon-trash"></i>');
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