<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('roles' , 'Roles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Rol</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('roles/confirmAddRol'); ?>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
						</div>
					</div>
				</div>	
				<div class="clearfix">
		            <?php 
		            	echo anchor("roles/index", 'Cancelar', array("class"=>'btn btn-inverse'));
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