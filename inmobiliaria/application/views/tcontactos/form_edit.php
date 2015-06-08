<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('roles' , 'Roles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Tipo de Contacto</li>
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
		<?php echo form_open('roles/confirmEditRol'); ?>
		<input type="hidden" name="id" value="<?php echo $idRol; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Editar Tipo de Contacto</h5>
				</div>
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
		            	echo anchor("roles/index", 'Cancelar', array("class"=>'btn btn-inverse'));
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Editar',
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