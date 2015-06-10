<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">EInmuebles</li>
		</ul>
		<?php echo anchor(
							'einmuebles/formAddEInmueble',
							"Agregar Estado de Inmueble", 
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
				foreach($einmuebles as $ti){
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
					echo anchor("einmuebles/formEditEInmueble/".$ti->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("einmuebles/formDeleteEInmueble/".$ti->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar EInmueble")); 
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