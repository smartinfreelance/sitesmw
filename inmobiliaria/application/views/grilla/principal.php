<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Inmuebles</li>
		</ul>
		<?php echo anchor(
							'inmuebles/formAddInmueble',
							"Agregar Inmueble", 
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
		<table class="table table-striped" width="100%">
			<thead>
				<tr>
					<th width="10%">
						Imagen
					</th>
					<th width="80%">
						Detalle
					</th>
					<th width="10%">
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
					$cant = 0;
					foreach ($fotos_thumb[$i->id] as $ft) {
						$cant++;
						if($ft->id_inmueble == $i->id){
			?>
							<img src="<?php echo base_url().$ft->path_thumb;?>" />
			<?php			
						}
					}
					if($cant==0){
			?>				<img src="<?php echo base_url()."uploads/fotos_inmuebles/sinimagen_thumb.png";?>" />
			<?php
					}
			?>
						<!-- ESTABLE -->
					</td>
					<td>
						<table width="100%">
							<tr>
								<td>
									<h4><?php echo html_entity_decode($i->direccion).", ".$i->nombre_localidad.", ".$i->nombre_departamento; ?></h4>
								</td>
							</tr>
							<tr>
								<td><?php echo $i->tipo_inmueble." en ".$i->operacion." en ".$i->nombre_localidad." - ".$i->nombre_departamento;?></td>
							</tr>
							<tr>
								<td><?php echo html_entity_decode(substr($i->descripcion, 0, 50));?></td>
							</tr>
							<tr>
								<td>
									<h6>
										<?php if($i->antiguedad == 0){ echo "A Estrenar";}else{ echo $i->antiguedad." años ";}?>|
										<?php echo " ".$i->nombre_einmueble." ";?>|
										<?php echo " ".$i->superficie_cubierta." m2";?>
									</h6>
								</td>
							</tr>							
						</table>
			
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