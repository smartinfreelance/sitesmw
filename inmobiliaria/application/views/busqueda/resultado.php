<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Resulado de la Busqueda</li>
		</ul>
		<?php echo anchor(
							'inmuebles/formAddInmueble',
							"Agregar Inmueble", 
							array("class"=>'btn btn-success')); 
		?><br />
		<br />
		<?php
			//if($links!=""){
		?>
				<!--<div class='container' align='center'>
					<ul class = 'breadcrumb'>
						<li>
							<?php //echo $links; ?>
						</li>
					</ul>
				</div>-->
		<?php
			//}
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						#ID
					</th>
					<th>
						Direccion
					</th>
					<th>
						Piso
					</th>
					<th>
						Depto
					</th>							
					<th>
						Tipo
					</th>							
					<th>
						Operacion
					</th>							
					<th>
						Contacto
					</th>			
					<th>
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($inmuebles as $i){
			?>
				<tr>
					<td>
			<?php				
					echo $i->id;
			?>
					</td>
					<td>
			<?php
					echo html_entity_decode($i->direccion);
			?>
					</td>
					<td>
			<?php
					if($i->piso == 0){
						echo "PB";
					}else{
						echo $i->piso;
					}
			?>
					</td>
					<td>
			<?php
					echo $i->depto;
			?>
					</td>
					<td>
			<?php
					echo $i->tipo_inmueble;
			?>
					</td>
					<td>
			<?php
					echo $i->operacion;
			?>
					</td>
					<td>
			<?php
					echo $i->contacto;
			?>
					</td>
					<td>
			<?php
					echo anchor("inmuebles/formEditInmueble/".$i->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("inmuebles/formDeleteInmueble/".$i->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Inmueble")); 
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