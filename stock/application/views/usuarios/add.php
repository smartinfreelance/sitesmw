<?php echo validation_errors(); ?>
<?php echo form_open('usuarios/confirmAddUsuario'); ?>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Usuario" name="usuario" value="<?php echo set_value('usuario'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Apellido" name="apellido" value="<?php echo set_value('apellido'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="DNI" name="dni" value="<?php echo set_value('dni'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Fecha de Nacimiento" name="fecha_nac" value="<?php echo set_value('fecha_nac'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Mail" name="mail" value="<?php echo set_value('mail'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<select id = "id_rol" name = "id_rol">
					<?php
						foreach($roles as $r){
					?>
						<option value = '<?php echo $r->id; ?>'><?php echo $r->nombre; ?></option>
					<?php						
						}
					?>
					</select>
				</div>
			</div>
		</div>	
		<div class="clearfix">
            <?php 
            	echo anchor("usuarios/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Agregar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>