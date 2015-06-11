<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Busqueda</li>
		</ul>
		<?php echo form_open('busqueda/buscar'); ?>		
		<div class="widget-content">
			<div class="nonboxy-widget">		
				<div class="control-group">
					<label class="control-label" for="typehead">Ubicacion Geografica</label>
					<div class="controls">
						<div>
							<select id = "id_tinmueble" name = "id_tinmueble" autocomplete = "off">
								<option value = "" selected = 'selected'>Tipo de Inmueble</option>
							<?php
								foreach($tinmuebles as $ti){
							?>
								<option value = "<?php echo $ti->id?>"><?php echo $ti->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<select id = "id_operacion" name = "id_operacion" autocomplete = "off">
								<option value = "" selected = 'selected'>Operacion</option>
							<?php
								foreach($operaciones as $o){
							?>
								<option value = "<?php echo $o->id?>"><?php echo $o->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<select id = "id_provincia" name = "id_provincia" autocomplete = "off">
								<option value = "" selected = 'selected'>Provincia</option>
							<?php
								foreach($provincias as $p){
							?>
								<option value = "<?php echo $p->id?>"><?php echo $p->nombre_provincia; ?></option>
							<?php
								}
							?>
							</select>
							<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
								<option value = "">Departamento</option>
							</select>
							<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
								<option value = "">Localidad/Barrio</option>
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
<script type="text/javascript">  
	$(document).ready(function() { 
		
		$("#contacto_existente").css('display','none');
		$("#contacto_nuevo").css('display','block');

		$("#id_provincia").change(function(){  
			/*dropdown post *///  
			$("#id_localidad").html("<option value=''>Localidad/Barrio</option>");  
			$("#provincia_text").val($('#id_provincia option:selected').text());  
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
			/*dropdown post *///  
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