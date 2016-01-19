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
					<h5>Detalles</h5>
				</div>

				<div class = "row">
					<div class = "span3">
						<div class="control-group">
							<label class="control-label" for="typehead">Tipo de Inmueble</label>
							<div class="controls">
								<div>
									<select id = "id_tinmueble" name = "id_tinmueble" autocomplete = "off">
										<option value = "" selected = 'selected'>Seleccione</option>
									<?php
										foreach($tinmuebles as $ti){
									?>
										<option value = "<?php echo $ti->id?>"><?php echo $ti->nombre; ?></option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class = "span3">
						<div class="control-group">
							<label class="control-label" for="typehead">Operacion</label>
							<div class="controls">
								<div>
									<select id = "id_operacion" name = "id_operacion" autocomplete = "off">
										<option value = "" selected = 'selected'>Seleccione</option>
									<?php
										foreach($operaciones as $o){
									?>
										<option value = "<?php echo $o->id?>"><?php echo $o->nombre; ?></option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class = "span3">
						<div class="control-group">
							<label class="control-label" for="typehead">Estado del Inmueble</label>
							<div class="controls">
								<div>
									<select id = "estado_inmueble" name = "estado_inmueble" autocomplete = "off">
										<option value = "" selected = 'selected'>Seleccione</option>
									<?php
										foreach($estados_inmueble as $ei){
									?>
										<option value = "<?php echo $ei->id?>" ><?php echo $ei->nombre; ?></option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class = "span3">
					</div>
				</div>
				
				<div class = "row">
					<div class = "span12">
						<label class="control-label" for="typehead">Ubicacion Geografica</label>
					</div>
				</div>
				<div class = "row">
					<div class = "span3">
						<div class="control-group">
							<div class="controls">
								<div>
									<select id = "id_provincia" name = "id_provincia" autocomplete = "off">
										<option value = "" selected = 'selected'>Provincia</option>
									<?php
										foreach($provincias as $p){
									?>
										<option value = "<?php echo $p->id?>"><?php echo $p->nombre; ?></option>
									<?php
										}
									?>
									</select>
									<input type = "hidden" id = "provincia_text" name = "provincia_text" value = ""/>
								</div>
							</div>
						</div>
					</div>
					<div class = "span3">
						<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
							<option value = "">Departamento</option>
						</select>
						<input type = "hidden" id = "departamento_text" name = "departamento_text" value = ""/>
					</div>
					<div class = "span3">
						<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
							<option value = "">Localidad/Barrio</option>
						</select>
						<input type = "hidden" id = "localidad_text" name = "localidad_text" value = ""/>
					</div>
					<div class = "span3">
					</div>					
				</div>
				<div class = "row">
					<div class ="span6">
						<label class="control-label" for="typehead">Direccion</label>	
					</div>
					<div class ="span1">
						<label class="control-label" for="typehead">Piso</label>	
					</div>
					<div class ="span5">
						<label class="control-label" for="typehead">Departamento</label>	
					</div>
				</div>
				<div class = "row">
					<div class = "span6">
						<input type="text" class="span5" placeholder = "Calle" id="calle" name ="calle" value = "" maxlength= "50">
						<input type="text" class="span1" placeholder = "Altura" id="altura" name ="altura" value = "" maxlength= "5">
					</div>
					<div class = "span1">
						<select id = "piso" name="piso" class="span1">
								<!--<option value = "">Piso</option>-->
								<option value = "0">PB</option>
						<?php
							for($p=1; $p <= 30; $p++){
						?>
								<option value = "<?php echo $p; ?>"><?php echo $p; ?></option>
						<?php
							}
						?>

							</select>
					</div>
					<div class = "span5">
						<input type="text" class="span1" placeholder = "Depto" id="depto" name ="depto" value = "" maxlength="2">
					</div>
				</div>

				<div class = "row">
					<div class = "span3">
						<label class="control-label" for="typehead">Superficie cubierta</label>
						<input type="text" class="span1" placeholder = "0" id="superficie_cubierta" name ="superficie_cubierta" value = "" maxlength= "4">m<sup>2</sup>
					</div>
					<div class = "span3">
						<label class="control-label" for="typehead">Superficie Descubierta</label>
						<input type="text" class="span1" placeholder = "0" id="superficie_descubierta" name ="superficie_descubierta" value = "" maxlength= "4"> m<sup>2</sup>
					</div>
					<div class = "span3">
						<label class="control-label" for="typehead">Antiguedad</label>
						<input type="text" style="width:25px;" placeholder = "0" id = "antiguedad" name = "antiguedad" value = "" maxlength= "3"> años
					</div>
					<div class = "span3">
						
					</div>
				</div>
				<div class = "row">
					<div class = "span12">
						<label class="control-label" for="typehead">Precio</label>
						<select id = "moneda" name = "moneda" class="span1">
							<option value = "$" >$</option>
							<option value = "U$S" >U$S</option>
						</select>
						<input type="text" class="span1" id="precio" name ="precio" value = "" maxlength="8">
					</div>
				</div>

				<div class = "row">
					<div class = "span12">
						<label class="control-label" for="typehead">Descripcion</label>
						<textarea rows = "5" style="width:100%;" id="descripcion" name ="descripcion" maxlength="2000"></textarea>
					</div>
				</div>

				<div class = "row">
					<div class = "span12">
						<div class="widget-head">
							<h5>Ambientes</h5>
						</div>
					</div>
				</div>

				<?php
					$cols = 0;
					foreach($ambientes as $a){
						if($cols == 0){
							echo "<div class = 'row'>";
						}
					?>
						<div class = "span2">
							<label>
								<input type = "checkbox" id = "ambientes[]" name = "ambientes[]" value = "<?php echo $a->id; ?>" /> <?php echo $a->nombre; ?>
							</label>
						</div>
					<?php

						if($cols == 12){
							echo "</div>";
							$cols = 0;
						}else{
							$cols++;
						}
					}
					$colsFaltantes = 0;
					if($cols < 12){
						$colsFaltantes = 12 - $cols;
						echo "<div class = 'span".$colsFaltantes."'></div></div>";
					}
				?>

				<div class = "row">
					<div class = "span12">
						<div class="widget-head">
							<h5>Instalaciones</h5>
						</div>
					</div>
				</div>

				<?php
					$cols = 0;
					foreach($instalaciones as $i){
						if($cols == 0){
							echo "<div class = 'row'>";
						}
					?>
					<div class = "span2">
						<label>
							<input type = "checkbox" id = "instalaciones[]" name = "instalaciones[]" value = "<?php echo $i->id; ?>" /> <?php echo $i->nombre; ?></label>
						</label>
					</div>
				<?php

						if($cols == 12){
							echo "</div>";
							$cols = 0;
						}else{
							$cols++;
						}
					}
					$colsFaltantes = 0;
					if($cols < 12){
						$colsFaltantes = 12 - $cols;
						echo "<div class = 'span".$colsFaltantes."'></div></div>";
					}
				?>


				<div class = "row">
					<div class = "span12">
						<div class="widget-head">
							<h5>servicios</h5>
						</div>
					</div>
				</div>

				<?php
					$cols = 0;
					foreach($servicios as $s){
						if($cols == 0){
							echo "<div class = 'row'>";
						}
					?>
					<div class = "span2">
						<label>
							<input type = "checkbox" id = "servicios[]" name = "servicios[]" value = "<?php echo $s->id; ?>" /> <?php echo $s->nombre; ?>
						</label>
					</div>
				<?php

						if($cols == 12){
							echo "</div>";
							$cols = 0;
						}else{
							$cols++;
						}
					}
					$colsFaltantes = 0;
					if($cols < 12){
						$colsFaltantes = 12 - $cols;
						echo "<div class = 'span".$colsFaltantes."'></div></div>";
					}
				?>

				<div class="control-group">
					<label class="control-label">Contacto</label>
					<div class="controls">
						<label class="radio">
							<input type = "radio" id = "contact_exist" name = "contact_exist" value = "contacto_existente"> Contacto existente
						</label>
						<label class="radio">
							<input type = "radio" id = "contact_exist" name = "contact_exist" value = "contacto_nuevo" checked> Contacto Nuevo
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
													<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "" maxlength = "50">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="typehead">Telefono</label>
												<div class="controls">
													<input type="text" class=" input-xlarge" id="telefono" name ="telefono" value = "" maxlength="14">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">Tipo Contacto</label>
												<div class="controls">
													<select id = "id_tipo" name = "id_tipo">
														<option value = "" selected = 'selected'>Seleccionar</option>
													<?php
														foreach($tcontactos as $tc){
													?>
														<option value ="<?php echo $tc->id; ?>"><?php echo $tc->nombre; ?></option>
													<?php
														}
													?>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="typehead">E-mail</label>
												<div class="controls">
													<input type="text" class=" input-xlarge" id="mail" name ="mail" value = "" maxlength="50">
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
									<option value = "" selected = 'selected'>Seleccione</option>
								<?php
									foreach($contactos as $c){
								?>
									<option value = "<?php echo $c->id?>"><?php echo $c->nombre; ?></option>
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
		
		$("#contacto_existente").css('display','none');
		$("#contacto_nuevo").css('display','block');

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