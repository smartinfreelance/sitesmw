<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('usuarios' , 'Usuarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Usuario</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('usuarios/confirmAddUsuario'); ?>
		<div class="widget-content">
			<div class="widget-box">
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
							<input type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
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
		            	echo anchor("usuarios/index", 'Cancelar', array("class"=>'btn btn-inverse'));
		            	echo "&nbsp;"; 
		        		echo form_submit(array(
		        			'value'=>'Agregar',
		        			'class'=>'btn'
		        		)); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>