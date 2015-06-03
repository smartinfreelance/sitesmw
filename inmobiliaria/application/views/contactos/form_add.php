<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('contactos' , 'Contactos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Contacto</li>
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
		<?php echo form_open('contactos/addContacto'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Agregar Contacto</h5>
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
											<option value = "">Seleccionar</option>
										<?php
											foreach($tcontactos as $tc){
										?>
											<option value ="<?php echo $tc->id; ?>" <?php 
																						if(set_value('id_tipo')!=""){ 
																							if(set_value('id_tipo') == $tc->id){
																								echo "selected = 'true'";
																							}
																						}
																					?>><?php echo $tc->nombre; ?></option>
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
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Agregar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("contactos/index", 'Cancelar', array("class"=>'btn btn-warning')); 
						        	?>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>