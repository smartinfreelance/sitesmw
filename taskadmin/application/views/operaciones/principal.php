<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Operaciones</li>
		</ul>
		<?php echo anchor(
							'operaciones/formAddOperacion',
							"Agregar Operacion", 
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
				foreach($operaciones as $o){
			?>
				<tr>
					<td>
			<?php				
					echo $o->id;
			?>
					</td>
					<td>
			<?php
					echo $o->nombre;
			?>
					</td>
					<td>
			<?php
					echo anchor("operaciones/formEditOperacion/".$o->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("operaciones/formDeleteOperacion/".$o->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Operacion")); 
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