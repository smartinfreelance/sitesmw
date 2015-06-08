<?php $this->load->view('aux_functions'); ?>
<!--http://uno-de-piera.com/selects-en-cascada-con-codeigniter-y-jquery-4-niveles/-->
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('inmuebles' , 'Inmuebles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Inmueble</li>
		</ul>
		<?php
			if(validation_errors()!=""){
		?>
			<div class="widget-box">
				<div class="alert alert-error fade in">
					<strong><?php echo validation_errors(); ?></strong>
				</div>
			</div>
		<?php
			}
		?>
		<?php echo form_open('inmuebles/addInmueble'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Agregar Inmueble</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tipo de Inmueble</label>
					<div class="controls">
						<div>
							<select id = "id_tinmueble" name = "id_tinmueble" autocomplete = "off">
								<option value = ""<?php if(set_value('id_tinmueble')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($tinmuebles as $ti){
							?>
								<option value = "<?php echo $ti->id?>" <?php echo populateSelect(set_value('id_tinmueble'),"",$ti->id); ?> ><?php echo $ti->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Operacion</label>
					<div class="controls">
						<div>
							<select id = "id_operacion" name = "id_operacion" autocomplete = "off">
								<option value = ""<?php if(set_value('id_operacion')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($operaciones as $o){
							?>
								<option value = "<?php echo $o->id?>" <?php echo populateSelect(set_value('id_operacion'),"",$o->id); ?> ><?php echo $o->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Ubicacion Geografica</label>
					<div class="controls">
						<div>
							<select id = "id_provincia" name = "id_provincia" autocomplete = "off">
								<option value = ""<?php if(set_value('id_provincia')==""){ echo "selected = 'selected'"; }?>>Provincia</option>
							<?php
								foreach($provincias as $p){
							?>
								<option value = "<?php echo $p->id?>" <?php echo populateSelect(set_value('id_provincia'),"",$p->id); ?> ><?php echo $p->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "provincia_text" name = "provincia_text" value = "<?php echo populateText(set_value('provincia_text'),''); ?>"/>
							&nbsp;
							<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
								<option value = "">Departamento</option>
							</select>
							<input type = "hidden" id = "departamento_text" name = "departamento_text" value = "<?php echo populateText(set_value('departamento_text'),''); ?>"/>
							&nbsp;
							<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
								<option value = "">Localidad/Barrio</option>
							</select>
							<input type = "hidden" id = "localidad_text" name = "localidad_text" value = "<?php echo populateText(set_value('localidad_text'),''); ?>"/>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Direccion</label>
					<div class="controls">
						<div>
							<input type="text" class="span2" placeholder = "Calle" id="calle" name ="calle" value = "<?php echo populateText(set_value('calle'),''); ?>" maxlength= "50">
							<input type="text" class="span1" placeholder = "Altura" id="altura" name ="altura" value = "<?php echo populateText(set_value('altura'),''); ?>" maxlength= "5">
							<select id = "piso" name="piso" class="span1">
								<option val = "">Piso</option>
								<option val = "0">PB</option>
						<?php
							for($p=1; $p <= 30; $p++){
						?>
								<option value = "<?php echo $p; ?>"><?php echo $p; ?></option>
						<?php
							}
						?>

							</select>
							<input type="text" class="span1" placeholder = "Depto" id="depto" name ="depto" value = "<?php echo populateText(set_value('depto'),''); ?>" maxlength="2">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="controls">
						<div>
							<textarea rows = "5" id="descripcion" name ="descripcion" maxlength="2000"><?php echo populateText(set_value('descripcion'),""); ?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Precio</label>
					<div class="controls">
						<div>
							<select id = "moneda" name = "moneda" class="span1">
								<option value = "$" >$</option>
								<option value = "U$S" >U$S</option>
							</select>
							<input type="text" class="span1" id="precio" name ="precio" value = "<?php echo populateText(set_value('precio'),''); ?>" maxlength="8">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Contacto</label>
					<div class="controls">
						<div>
							<select id = "id_contacto" name = "id_contacto" autocomplete = "off">
								<option value = ""<?php if(set_value('id_contacto')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($contactos as $c){
							?>
								<option value = "<?php echo $c->id?>" <?php echo populateSelect(set_value('id_contacto'),"",$c->id); ?> ><?php echo $c->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Agregar',
		        			'class'=>'btn btn-info'
		        		)); 
		        		echo "&nbsp;";
		        		echo anchor("inmuebles/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">  
	$(document).ready(function() { 
		$("#id_provincia").change(function(){  
			/*dropdown post *///  
			$("#id_localidad").html("<option value=''>Localidad/Barrio</option>");  
			$("#provincia_text").val($('#id_provincia option:selected').text());  
			$.ajax({  
				url:"<?php echo base_url();?>index.php/inmuebles/buildDeptos",  
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
				url:"<?php echo base_url();?>index.php/inmuebles/buildLocalidades",  
				data: {id: $(this).val()},  
				type: "POST",  
				success:function(data){  
					$("#id_localidad").html(data);  
				}  
			});  
		});  
	});  
</script> 