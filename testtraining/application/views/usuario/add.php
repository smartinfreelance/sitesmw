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
					<?php echo validation_errors(); ?>
					<?php echo form_open('usuario/confirmaAddUser', array("id" => "form_edit", "class" => "form-horizontal well")); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="input01">Usuario</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="Usuario" id="usuario" name = "usuario" value = "<?php echo set_value('usuario'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Nombre</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="Nombre" id="nombre" name ="nombre" value = "<?php echo set_value('nombre'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Apellido</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="Apellido" id="apellido" name = "apellido" value = "<?php echo set_value('apellido'); ?>" type="text">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Rol</label>
								<div class="controls">
									<select id = "id_rol" name = "id_rol">
										<option value = "0">Seleccionar</option>
										<?php
											foreach ($roles as $r) {
										?>
										<option value = "<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">E-mail</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="E-mail" id="email" name = "email" value = "<?php echo set_value('email'); ?>" type="text">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Fecha de Nacimiento</label>
								<div class="controls">
									<input id="fecha_nac" name = "fecha_nac" value = "<?php echo set_value('date'); ?>" type="text">
									<p class="help-block">
										Formato DD/MM/AAAA
									</p>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Password</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="" id="pass" name = "pass" value = "" type="password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Confirmar Password</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="" id="passconf" name = "passconf" value = "" type="password">
								</div>
							</div>
						</fieldset>
						<?php 
			        		echo form_submit(array(
			        			'value'=>'Agregar',
			        			'class'=>'btn btn-info'
			        		)); 
		        		?>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>