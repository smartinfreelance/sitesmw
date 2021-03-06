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
		<?php echo form_open('inmuebles/addInmueble',array('id'=>"form_add")); ?>
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
								<option value = "" <?php echo set_select('id_tinmueble', ''); ?>>Seleccione</option>
							<?php
								foreach($tinmuebles as $ti){
							?>
								<option value = "<?php echo $ti->id; ?>" <?php echo set_select('id_tinmueble', $ti->id); ?>><?php echo $ti->nombre; ?></option>
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
								<option value = "" <?php echo set_select('id_operacion', ''); ?>>Seleccione</option>
							<?php
								foreach($operaciones as $o){
							?>
								<option value = "<?php echo $o->id; ?>" <?php echo set_select('id_operacion',$o->id); ?> ><?php echo $o->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Estado del Inmueble</label>
					<div class="controls">
						<div>
							<select id = "estado_inmueble" name = "estado_inmueble" autocomplete = "off">
								<option value = "" <?php echo set_select('estado_inmueble',''); ?> >Seleccione</option>
							<?php
								foreach($estados_inmueble as $ei){
							?>
								<option value = "<?php echo $ei->id; ?>" <?php echo set_select('estado_inmueble',$ei->id); ?> ><?php echo $ei->nombre; ?></option>
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
								<option value = "" <?php echo set_select('id_provincia',''); ?>>Provincia</option>
							<?php
								foreach($provincias as $p){
							?>
								<option value = "<?php echo $p->id?>" <?php echo set_select('id_provincia',$p->id); ?> ><?php echo $p->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "provincia_text" name = "provincia_text" value = "<?php echo set_value('provincia_text'); ?>"/>
							&nbsp;
							<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
								<option value = "" <?php echo set_select('id_departamento',''); ?>>Departamento</option>
							<?php
								foreach($departamentos as $d){
							?>
								<option value = "<?php echo $d->id?>" <?php echo set_select('id_departamento',$d->id); ?> ><?php echo $d->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "departamento_text" name = "departamento_text" value = "<?php echo set_value('departamento_text'); ?>"/>
							&nbsp;
							<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
								<option value = "" <?php echo set_select('id_localidad',''); ?>>Localidad/Barrio</option>
							<?php
								foreach($localidades as $l){
							?>
								<option value = "<?php echo $l->id?>" <?php echo set_select('id_localidad',$l->id); ?> ><?php echo $l->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "localidad_text" name = "localidad_text" value = "<?php echo set_value('localidad_text'); ?>"/>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Direccion</label>
					<div class="controls">
						<div>
							<input type="text" class="span2" placeholder = "Calle" id="calle" name ="calle" value = "<?php echo set_value('calle'); ?>" maxlength= "50">
							<input type="text" class="span1" placeholder = "Altura" id="altura" name ="altura" value = "<?php echo set_value('altura'); ?>" maxlength= "5">
							<select id = "piso" name="piso" class="span1">
								<!--<option value = "">Piso</option>-->
								<option value = "0" <?php echo set_select('piso','0'); ?>>PB</option>
						<?php
							for($p=1; $p <= 30; $p++){
						?>
								<option value = "<?php echo $p; ?>" <?php echo set_select('piso',$p); ?>><?php echo $p; ?></option>
						<?php
							}
						?>

							</select>
							<input type="text" class="span1" placeholder = "Depto" id="depto" name ="depto" value = "<?php echo set_value('depto'); ?>" maxlength="2">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Ambientes</label>
					<div class="controls">
						<div>
							<?php
								foreach($ambientes as $a){
							?>
								<label><input type = "checkbox" id = "ambientes[]" name = "ambientes[]" value = "<?php echo $a->id; ?>" <?php echo set_checkbox('ambientes[]', $a->id); ?> /> <?php echo $a->nombre; ?></label>
							<?php
								}
							?>
							
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Instalaciones</label>
					<div class="controls">
						<div>
							<?php
								foreach($instalaciones as $i){
							?>
								<label><input type = "checkbox" id = "instalaciones[]" name = "instalaciones[]" value = "<?php echo $i->id; ?>" <?php echo set_checkbox('instalaciones[]', $i->id); ?> /> <?php echo $i->nombre; ?></label>
							<?php
								}
							?>
							
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Servicios</label>
					<div class="controls">
						<div>
							<?php
								foreach($servicios as $s){
							?>
								<label><input type = "checkbox" id = "servicios[]" name = "servicios[]" value = "<?php echo $s->id; ?>" <?php echo set_checkbox('servicios[]', $s->id); ?> /> <?php echo $s->nombre; ?></label>
							<?php
								}
							?>
							
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Superficie</label>
					<div class="controls">
						<div>
							Cubierta: <input type="text" class="span1" placeholder = "0" id="superficie_cubierta" name ="superficie_cubierta" value = "<?php echo set_value('superficie_cubierta'); ?>" maxlength= "4">m2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Descubierta: <input type="text" class="span1" placeholder = "0" id="superficie_descubierta" name ="superficie_descubierta" value = "<?php echo set_value('superficie_descubierta'); ?>" maxlength= "4"> m2
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Antiguedad</label>
					<div class="controls">
						<div>
							<input type="text" style="width:25px;" placeholder = "0" id="antiguedad" name ="antiguedad" value = "<?php echo set_value('antiguedad'); ?>" maxlength= "3"> años
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="controls">
						<div>
							<textarea rows = "5"  style="width:100%;" id="descripcion" name ="descripcion" maxlength="2000"><?php echo set_value('descripcion'); ?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Precio</label>
					<div class="controls">
						<div>
							<select id = "moneda" name = "moneda" class="span1">
								<option value = "$" <?php echo set_select('moneda','$'); ?>>$</option>
								<option value = "U$S" <?php echo set_select('moneda','U$S'); ?>>U$S</option>
							</select>
							<input type="text" class="span1" id="precio" name ="precio" value = "<?php echo set_value('precio'); ?>" maxlength="8">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Contacto</label>
					<div class="controls">
						<label class="radio">
							<input type = "radio" id = "contact_exist" name = "contact_exist" value = "contacto_existente" <?php echo set_radio('contact_exist', 'contacto_existente'); ?>> Contacto existente
						</label>
						<label class="radio">
							<input type = "radio" id = "contact_exist" name = "contact_exist" value = "contacto_nuevo" <?php echo set_radio('contact_exist', 'contacto_nuevo'); ?>> Contacto Nuevo
						</label>
					</div>
				</div>
				<div id = "contacto_nuevo">
					<div class="widget-content">
						<div class="nonboxy-widget">
							<div class="widget-head">
								<h5>Contacto</h5>
							</div>
							<div class="widget-content">
								<div class="widget-box">
									<form class="form-horizontal well">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="input01">Nombre</label>
												<div class="controls">
													<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php echo set_value('nombre'); ?>" maxlength = "50">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="typehead">Telefono</label>
												<div class="controls">
													<input type="text" class=" input-xlarge" id="telefono" name ="telefono" value = "<?php echo set_value('telefono'); ?>" maxlength="14">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">Tipo Contacto</label>
												<div class="controls">
													<select id = "id_tipo" name = "id_tipo">
														<option value = "" <?php echo set_select('id_tipo',''); ?>>Seleccionar</option>
													<?php
														foreach($tcontactos as $tc){
													?>
														<option value ="<?php echo $tc->id; ?>" <?php echo set_select('id_tipo',$tc->id); ?>><?php echo $tc->nombre; ?></option>
													<?php
														}
													?>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="typehead">E-mail</label>
												<div class="controls">
													<input type="text" class=" input-xlarge" id="mail" name ="mail" value = "<?php echo set_value('mail'); ?>" maxlength="50">
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id = "contacto_existente">
					<div class="control-group">
						<label class="control-label" for="typehead">Contacto</label>
						<div class="controls">
							<div>
								<select id = "id_contacto" name = "id_contacto" autocomplete = "off">
									<option value = "" <?php echo set_select("id_contacto",""); ?>>Seleccione</option>
								<?php
									foreach($contactos as $c){
								?>
									<option value = "<?php echo $c->id; ?>" <?php echo set_select("id_contacto",$c->id); ?> ><?php echo $c->nombre; ?></option>
								<?php
									}
								?>
								</select>
							</div>
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
		
		var test = $('input[name=contact_exist]:checked', '#form_add').val();	        
        if(test == "contacto_existente"){
	        $("#contacto_nuevo").css('display','none');
	        $("#contacto_existente").css('display','block');
	    }else if(test == "contacto_nuevo"){
	    	$("#contacto_nuevo").css('display','block');
	        $("#contacto_existente").css('display','none');
	    }

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

		$("input[name$='contact_exist']").click(function() {
	        var test = $('input[name=contact_exist]:checked', '#form_add').val();	        
	        if(test == "contacto_existente"){
		        $("#contacto_nuevo").css('display','none');
		        $("#contacto_existente").css('display','block');
		    }else if(test == "contacto_nuevo"){
		    	$("#contacto_nuevo").css('display','block');
		        $("#contacto_existente").css('display','none');
		    }
		}); 
	});  
</script> 