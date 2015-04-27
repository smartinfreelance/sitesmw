<?php echo validation_errors(); ?>
<?php echo form_open('roles/confirmEditRol'); ?>
<input type="hidden" name="id" value="<?php echo $idRol; ?>">
<br/>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Nombre" name="nombre" value="<?php 
																					if($rol->nombre){
																						echo $rol->nombre;
																					}else{
																						echo set_value('nombre'); 
																					}
																				?>">
				</div>
			</div>
		</div>	
		<div class="clearfix">
            <?php 
            	echo anchor("roles/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Editar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>