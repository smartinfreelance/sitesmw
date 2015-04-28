<?php echo validation_errors(); ?>
<?php echo form_open('usuarios/confirmEliminarusuario'); ?>
<input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
<br/>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->usuario; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->nombre; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->apellido; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->dni; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->fecha_nac; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $usuario->mail; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php  echo $usuario->rol; ?>
				</div>
			</div>
		</div>	
		<div class="clearfix">
            <?php 
            	echo anchor("usuarios/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Eliminar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>