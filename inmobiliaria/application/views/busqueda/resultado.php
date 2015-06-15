<?php echo form_open('busqueda/buscar'); ?>
<div id = "main-content">
	<div class = "container">		
		<div class="control-group">
			<ul class="breadcrumb">
	  			<li class="active">Busqueda</li>
			</ul>
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
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Resulado de la Busqueda</li>
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
<script type="text/javascript">  
	$(document).ready(function() { 
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