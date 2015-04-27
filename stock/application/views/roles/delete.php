<?php echo validation_errors(); ?>
<?php echo form_open('roles/confirmEliminarRol'); ?>
<input type="hidden" name="id" value="<?php echo $idRol; ?>">
<br/>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $rol->nombre; ?>
				</div>
			</div>
		</div>		
		<div class="clearfix">
            <?php 
            	echo anchor("roles/index", 'Cancelar'); 
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