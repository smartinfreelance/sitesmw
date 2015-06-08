<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('usuarios' , 'Usuarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Usuario</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('usuarios/deleteUsuario'); ?>
		<input type="hidden" id = "id_usuario" name="id_usuario" value="<?php echo $usuario->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Usuario?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario</label>
					<div class="controls">
						<div>
							<?php echo $usuario->usuario;?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre y Apellido</label>
					<div class="controls">
						<div>
							<?php echo $usuario->nombre." ".$usuario->apellido; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Rol</label>
					<div class="controls">
						<div>
							<?php echo $usuario->rol; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Fecha de Nacimiento</label>
					<div class="controls">
						<div>
							<?php echo $usuario->fecha_nac; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Mail</label>
					<div class="controls">
						<div>
							<?php echo $usuario->mail; ?>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Eliminar',
		        			'class'=>'btn btn-info'
		        		)); 
		        		echo "&nbsp;";
		        		echo anchor("usuarios/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>