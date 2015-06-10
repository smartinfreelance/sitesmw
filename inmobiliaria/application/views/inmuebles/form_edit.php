<?php $this->load->view('aux_functions'); ?>
<!--http://uno-de-piera.com/selects-en-cascada-con-codeigniter-y-jquery-4-niveles/-->
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('inmuebles' , 'Inmuebles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Inmueble</li>
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
		<?php echo form_open('inmuebles/editInmueble'); ?>
		<input type = "hidden" id = "id_inmueble" name = "id_inmueble" value = "<?php echo $inmueble->id; ?>"/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Editar Inmueble</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tipo de Inmueble</label>
					<div class="controls">
						<div>
							<select id = "id_tinmueble" name = "id_tinmueble" autocomplete = "off">
								<option value = "" <?php if($inmueble->id_tinmueble==""){echo "selected='selected'";} ?>>Seleccione</option>
							<?php
								foreach($tinmuebles as $ti){
							?>
								<option value = "<?php echo $ti->id?>" <?php if($inmueble->id_tipo==$ti->id){ echo "selected='selected'";} ?>><?php echo $ti->nombre; ?></option>
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
								<option value = "" <?php if($inmueble->id_operacion==""){echo "selected='selected'";} ?>>Seleccione</option>
							<?php
								foreach($operaciones as $o){
							?>
								<option value = "<?php echo $o->id?>" <?php if($inmueble->id_operacion==$o->id){echo "selected='selected'";} ?>><?php echo $o->nombre; ?></option>
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
								<option value = "">Seleccione</option>
							<?php
								foreach($estados_inmueble as $ei){
							?>
								<option value = "<?php echo $ei->id?>" <?php if($inmueble->estado_inmueble==$ei->id){echo "selected='selected'";} ?>><?php echo $ei->nombre; ?></option>
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
								<option value = ""  <?php if($inmueble->id_provincia==""){echo "selected='selected'";} ?>>Provincia</option>
							<?php
								foreach($provincias as $p){
							?>
								<option value = "<?php echo $p->id?>" <?php if($inmueble->id_provincia==$p->id){ echo "selected='selected'";} ?>><?php echo $p->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "provincia_text" name = "provincia_text" value = "<?php echo populateText(set_value('provincia_text'),''); ?>"/>
							&nbsp;
							<select id = "id_departamento" name = "id_departamento" autocomplete = "off">
								<option value = "" <?php if($inmueble->id_departamento==""){ echo "selected='selected'";} ?>>Departamento</option>
							<?php
								foreach($departamentos as $d){
							?>
								<option value = "<?php echo $d->id?>"<?php if($inmueble->id_departamento==$d->id){ echo "selected='selected'";} ?> ><?php echo $d->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "departamento_text" name = "departamento_text" value = "<?php echo populateText(set_value('departamento_text'),''); ?>"/>
							&nbsp;
							<select id = "id_localidad" name = "id_localidad" autocomplete = "off">
								<option value = "" <?php if($inmueble->id_localidad==""){ echo "selected='selected'";} ?>>Localidad/Barrio</option>
							<?php
								foreach($localidades as $l){
							?>
								<option value = "<?php echo $l->id?>" <?php if($inmueble->id_localidad==$l->id){ echo "selected='selected'";} ?> ><?php echo $l->nombre; ?></option>
							<?php
								}
							?>
							</select>
							<input type = "hidden" id = "localidad_text" name = "localidad_text" value = "<?php echo populateText(set_value('localidad_text'),''); ?>"/>
						</div>
					</div>
				</div>
				<?php
					$dire = explode(" ",$inmueble->direccion);
					$calle = "";
					for($i = 0; $i < sizeof($dire)-1; $i++){
						$calle = $calle.$dire[$i]." ";
					}
					$altura = $dire[sizeof($dire)-1];
				?>
				<div class="control-group">
					<label class="control-label" for="typehead">Direccion</label>
					<div class="controls">
						<div>
							<input type="text" class="span2" placeholder = "Calle" id="calle" name ="calle" value = "<?php echo $calle; ?>" maxlength= "50">
							<input type="text" class="span1" placeholder = "Altura" id="altura" name ="altura" value = "<?php echo $altura; ?>" maxlength= "5">
							<select id = "piso" name="piso" class="span1">
								<option value = "0" <?php if($inmueble->piso==0){ echo "selected = 'selected'"; } ?>>PB</option>
						<?php
							for($p=1; $p <= 30; $p++){
						?>
								<option value = "<?php echo $p; ?>" <?php if($inmueble->piso==$p){ echo "selected = 'selected'"; } ?>><?php echo $p; ?></option>
						<?php
							}
						?>

							</select>
							<input type="text" class="span1" placeholder = "Depto" id="depto" name ="depto" value = "<?php echo $inmueble->depto; ?>" maxlength="2">
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
								<label><input type = "checkbox" id = "ambientes[]" name = "ambientes[]" value = "<?php echo $a->id; ?>" <?php foreach($amb_sel as $as){if($as->id_ambiente==$a->id) echo "checked"; }?>/> <?php echo $a->nombre; ?></label>
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
								<label><input type = "checkbox" id = "instalaciones[]" name = "instalaciones[]" value = "<?php echo $i->id; ?>" <?php foreach($ins_sel as $is){if($is->id_instalacion==$i->id) echo "checked"; }?>/> <?php echo $i->nombre; ?></label>
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
								<label><input type = "checkbox" id = "servicios[]" name = "servicios[]" value = "<?php echo $s->id; ?>" <?php foreach($ser_sel as $ss){if($ss->id_servicio==$s->id) echo "checked"; }?>/> <?php echo $s->nombre; ?></label>
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
							Cubierta: <input type="text" class="span1" placeholder = "0" id="superficie_cubierta" name ="superficie_cubierta" value = "<?php echo $inmueble->superficie_cubierta; ?>" maxlength= "4">m2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Descubierta: <input type="text" class="span1" placeholder = "0" id="superficie_descubierta" name ="superficie_descubierta" value = "<?php echo $inmueble->superficie_descubierta; ?>" maxlength= "4"> m2
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Antiguedad</label>
					<div class="controls">
						<div>
							<input type="text" style="width:25px;" placeholder = "0" id = "antiguedad" name = "antiguedad" value = "<?php echo $inmueble->antiguedad; ?>" maxlength= "3"> años
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="controls">
						<div>
							<textarea rows = "5" id="descripcion" name ="descripcion" maxlength="2000"><?php echo $inmueble->descripcion; ?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Precio</label>
					<div class="controls">
						<div>
							<select id = "moneda" name = "moneda" class="span1">
								<option value = "$" <?php if($inmueble->moneda=="$") echo "selected='selected'"; ?>>$</option>
								<option value = "U$S" <?php if($inmueble->moneda=="U$S") echo "selected='selected'"; ?>>U$S</option>
							</select>
							<input type="text" class="span1" id="precio" name ="precio" value = "<?php echo $inmueble->precio; ?>" maxlength="8">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Contacto</label>
					<div class="controls">
						<div>
							<select id = "id_contacto" name = "id_contacto" autocomplete = "off">
								<option value = "" <?php if($inmueble->id_contacto=="") echo "selected='selected'"; ?>>Seleccione</option>
							<?php
								foreach($contactos as $c){
							?>
								<option value = "<?php echo $c->id?>" <?php if($inmueble->id_contacto==$c->id) echo "selected='selected'"; ?> ><?php echo $c->nombre; ?></option>
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
		        			'value'=>'Editar',
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
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Fotos de Inmueble</h5>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
						<?php
							foreach($fotos as $f){
						?>
								<img src = "<?php echo base_url().$f->path_thumb; ?>" alt = "<?php echo $f->direccion_inmueble; ?>"/>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo anchor("inmuebles/form_cargar_foto/".$inmueble->id, 'Editar Fotos', array("class"=>'btn btn-info')); 
		        	?>
				</div>
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