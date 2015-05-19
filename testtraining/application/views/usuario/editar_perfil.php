<script>
$(document).on('click', 'form_edit button[type=submit]', function(e) {
    var isValid = $(e.target).parents('form_edit').isValid();
    if(!isValid) {
      e.preventDefault(); //prevent the default action
    }
});
</script>
<div id = "main-content">
	<div class = "container">	
		<div class="nonboxy-widget">
			<div class="widget-head">
				<h5>Editar mi Perfil</h5>
			</div>
			<div class="widget-content">
				<div class="widget-box">
					<?php echo form_open('usuarios/confirmaEditarPerfil', array("id" => "form_edit", "class" => "form-horizontal well")); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="input01">Usuario</label>
								<div class="controls">
									<input class="input-xlarge disabled" disabled="disabled" placeholder="<?php echo $this->session->userdata('usuario'); ?>" id="usuario" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Nombre</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="nombre" name ="nombre" value = "<?php echo $this->session->userdata('nombre'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Apellido</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="apellido" name = "apellido" value = "<?php echo $this->session->userdata('apellido'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">E-mail</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="email" name = "email" value = "<?php echo $this->session->userdata('mail'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Fecha de Nacimiento</label>
								<div class="controls">
									<input name="date" id="date" value = "<?php echo $this->session->userdata('fecha_nac'); ?>"type="text">
									<p class="help-block">
										Formato DD/MM/AAAA
									</p>
								</div>
							</div>
						</fieldset>
						<div class="form-actions">
							<?php 
				            	echo anchor("categorias/index", 'Cancelar', array("class"=>'btn')); 
				            	echo "&nbsp;";
				        		echo form_submit(array(
				        			'value'=>'Editar Perfil',
				        			'class'=>'btn btn-inverse'
				        		)); 
				        	?>
						</div>
					</form>
				</div>
			</div>

			<div class="widget-head">
				<h5>Cambiar Password</h5>
			</div>
			<div class="widget-content">
				<div class="widget-box">
					<?php echo form_open('usuarios/cambiar_pasword', array("class"=> "form-horizontal well")); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="input01">Pasword Actual</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="input01" type="password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Nuevo Password</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="input01" type="password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Cambiar Pasword</label>
								<div class="controls">
									<input class="input-xlarge text-tip" id="input01" type="password">
								</div>
							</div>
							<div class="form-actions">
								<?php 
					            	echo anchor("categorias/index", 'Cancelar', array("class"=>'btn')); 
					            	echo "&nbsp;";
					        		echo form_submit(array(
					        			'value'=>'Cambiar Password',
					        			'class'=>'btn btn-inverse'
					        		)); 
					        	?>
							</div>

						</fieldset>
					</form>
				</div>
			</div>			
		</div>
	</div>
</div>