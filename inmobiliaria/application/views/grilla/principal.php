<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Busqueda</li>
		</ul>
		<?php echo form_open('grilla/buscar'); ?>		
		<div class="widget-content">
			<div class="nonboxy-widget">		
				<div class="control-group">
					<label class="control-label" for="typehead">Filtros</label>
						<div class="controls">
							<div>
						<select id = "id_tinmueble" name = "id_tinmueble" autocomplete = "off">
							<option value = "" <?php if($filtros['id_tinmueble']==""){ echo "selected = 'selected'"; } ?>>Todos los Tipos de Inmueble</option>
						<?php
							foreach($tinmuebles as $ti){
						?>
							<option value = "<?php echo $ti->id;?>" <?php if($filtros['id_tinmueble']==$ti->id){ echo "selected = 'selected'"; } ?>><?php echo $ti->nombre; ?></option>
						<?php
							}
						?>
						</select>
						<select id = "id_operacion" name = "id_operacion" autocomplete = "off">
							<option value = "" <?php if($filtros['id_operacion']==""){ echo "selected = 'selected'"; } ?>>Todas las Operaciones</option>
						<?php
							foreach($operaciones as $o){
						?>
							<option value = "<?php echo $o->id; ?>" <?php if($filtros['id_operacion']==$o->id){ echo "selected = 'selected'"; } ?>><?php echo $o->nombre; ?></option>
						<?php
							}
						?>
						</select>
						<select id = "id_provincia" name = "id_provincia" autocomplete = "off">
							<option value = "" <?php if($filtros['id_provincia']==""){ echo "selected = 'selected'"; } ?>>Todas las Provincias</option>
						<?php
							foreach($provincias as $p){
						?>
							<option value = "<?php echo $p->id; ?>" <?php if($filtros['id_provincia']==$p->id){ echo "selected = 'selected'"; } ?>><?php echo $p->nombre_provincia; ?></option>
						<?php
							}
						?>
						</select>
						<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
							<option value = "" <?php if($filtros['id_departamento']==""){ echo "selected = 'selected'"; } ?>>Todos los Departamentos</option>
						<?php
							foreach($departamentos as $d){
						?>
							<option value = "<?php echo $d->id; ?>" <?php if($filtros['id_departamento']==$d->id){ echo "selected = 'selected'"; } ?>><?php echo $d->nombre; ?></option>
						<?php
							}
						?>
						</select>
						<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
							<option value = "" <?php if($filtros['id_localidad']==""){ echo "selected = 'selected'"; } ?>>Todas las Localidades/Barrios</option>
						<?php
							foreach($localidades as $l){
						?>
							<option value = "<?php echo $l->id; ?>" <?php if($filtros['id_localidad']==$l->id){ echo "selected = 'selected'"; } ?>><?php echo $l->nombre; ?></option>
						<?php
							}
						?>
						</select>
					</div>
						<div>
							<div class="form-actions" align="right">
								<?php 
					        		echo form_submit(array(
					        			'value'=>'Buscar',
					        			'class'=>'btn btn-success'
					        		)); 
					        	?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Inmuebles</li>
		</ul>
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
				$x = 0;
				foreach($inmuebles as $i){
					$x++;
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
							<!--<tr>
								<td><?php //echo html_entity_decode(substr($i->descripcion, 0, 50));?></td>
							</tr>-->
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
						echo anchor("inmuebles/getInmueble/".$i->id, '<span class="icon-info-sign icon-white"></span> Mas Info</a>',array("class"=>"btn btn-info","style"=>"align:center;")); 
						echo "<br />";
						echo "<br />";
						//echo anchor("inmuebles/formEditInmueble/".$i->id, '<span class="icon-info-sign icon-white"></span>Contacto</a>',array("class"=>"btn btn-warning","style"=>"align:center;")); 
				?>
						<a href = "#" id = "modalContacto<?php echo $x; ?>" class = "btn btn-warning" style = "align:center"><span class="white-icons mail"></span> Contacto</a></a>
						<div class="modal fade" id="contactModal<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="titleStandard"><?php echo $i->direccion; ?></h4>
									</div>
									<div class="modal-footer">
										<div class="form-actions" id = "buttonPop<?php echo $x; ?>">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
										<div class="form-actions" id = "buttonSend<?php echo $x; ?>">
											<?php 
								        		echo anchor("inmuebles/form_cargar_foto/".$i->id, 'Enviar', array("class"=>'btn btn-info')); 
								        	?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">  
	$(document).ready(function() { 
		$("#modalContacto1").on("click", function() {
   			$('#contactModal1').modal('show'); 
   			$("#buttonPop1").css('display','block');
   		});
   		$("#modalContacto2").on("click", function() {
   			$('#contactModal2').modal('show'); 
   			$("#buttonPop2").css('display','block');
   		});
   		$("#modalContacto3").on("click", function() {
   			$('#contactModal3').modal('show'); 
   			$("#buttonPop3").css('display','block');
   		});
   		$("#modalContacto4").on("click", function() {
   			$('#contactModal4').modal('show'); 
   			$("#buttonPop4").css('display','block');
   		});
   		$("#modalContacto5").on("click", function() {
   			$('#contactModal5').modal('show'); 
   			$("#buttonPop5").css('display','block');
   		});
   		$("#modalContacto6").on("click", function() {
   			$('#contactModal6').modal('show'); 
   			$("#buttonPop6").css('display','block');
   		});
   		$("#modalContacto7").on("click", function() {
   			$('#contactModal7').modal('show'); 
   			$("#buttonPop7").css('display','block');
   		});
   		$("#modalContacto8").on("click", function() {
   			$('#contactModal8').modal('show'); 
   			$("#buttonPop8").css('display','block');
   		});
   		$("#modalContacto9").on("click", function() {
   			$('#contactModal9').modal('show'); 
   			$("#buttonPop9").css('display','block');
   		});
   		$("#modalContacto10").on("click", function() {
   			$('#contactModal10').modal('show'); 
   			$("#buttonPop10").css('display','block');
   		});

		if($('#id_provincia option:selected').val() != ""){
			$('#id_departamento').prop('disabled', false);
		}else{
			$('#id_departamento').prop('disabled', 'disabled');
		}

		if($('#id_departamento option:selected').val() != ""){
			$('#id_localidad').prop('disabled', false);
		}else{
			$('#id_localidad').prop('disabled', 'disabled');
		}

		$("#id_provincia").change(function(){  
			$("#id_localidad").html("<option value=''>Todos los Localidades/Barrios</option>");  
			$('#id_localidad').prop('disabled', 'disabled');
			if($(this).val()!=""){
				$('#id_departamento').prop('disabled', false);
			}else{
				$("#id_departamento").html("<option value=''>Todos los Departamentos</option>");  
				$('#id_departamento').prop('disabled', 'disabled');
			}
			$.ajax({  
				url:"<?php echo base_url();?>index.php/busqueda/buildDeptosToSearch",  
				data: {id: $(this).val()},  
				type: "POST",  
				success:function(data){  
					$("#id_departamento").html(data);  
				}  
			});  
		});  

		$("#id_departamento").change(function(){  
			if($(this).val()!=""){
				$('#id_localidad').prop('disabled', false);
			}else{
				$('#id_localidad').prop('disabled', 'disabled');
			}
			$.ajax({  
				url:"<?php echo base_url();?>index.php/busqueda/buildLocalidadesToSearch",  
				data: {id: $(this).val()},  
				type: "POST",  
				success:function(data){  
					$("#id_localidad").html(data);  
				}  
			});  
		});  
	});  
</script> 