<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">TInmuebles</li>
		</ul>
		<?php echo anchor(
							'tinmuebles/formAddTInmueble',
							"Agregar Tipo de Inmueble", 
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
				foreach($tinmuebles as $ti){
			?>
				<tr>
					<td>
			<?php				
					echo $ti->id;
			?>
					</td>
					<td>
			<?php
					echo $ti->nombre;
			?>
					</td>
					<td>
			<?php
					echo anchor("tinmuebles/formEditTInmueble/".$ti->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("tinmuebles/formDeleteTInmueble/".$ti->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar TInmueble")); 
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