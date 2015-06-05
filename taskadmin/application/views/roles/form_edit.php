<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('roles' , 'Roles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Rol</li>
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
		<?php echo form_open('roles/editRol'); ?>
		<input type="hidden" name="id_rol" value="<?php echo $rol->id; ?>">
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Editar Rol</h5>
				</div>
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php echo populateText(set_value('nombre'),$rol->nombre); ?>">
										<input type="hidden" class="input-xlarge" id="nombre_check" name ="nombre_check" value = "<?php echo $rol->nombre; ?>">
									</div>
								</div>

								<div class="control-group">
										<label class="control-label">Rol Superior</label>
										<div class="controls">
											<select id = "id_superior" name = "id_superior" autocomplete = "off">
												<option value = ""<?php if(set_value('id_superior')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
											<?php
												foreach($roles as $r){
													if($r->id > 1){
											?>
												<option value = "<?php echo $r->id?>" <?php echo populateSelect(set_value('id_superior'),$rol->id_superior,$r->id); ?> ><?php echo $r->nombre; ?></option>												
											<?php
													}
												}
											?>
											</select>
										</div>
									</div>

								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Editar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("roles/index", 'Cancelar', array("class"=>'btn btn-warning'));
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