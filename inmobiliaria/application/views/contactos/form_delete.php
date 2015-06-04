<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('contactos' , 'Contactos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Contacto</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('contactos/deleteContacto'); ?>
		<input type="hidden" name="id_contacto" value="<?php echo $contacto->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Contacto?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="controls">
						<div>
							<?php echo $contacto->nombre;?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Telefono</label>
					<div class="controls">
						<?php echo $contacto->telefono;?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo Contacto</label>
					<div class="controls">
						<?php echo $contacto->tipo_contacto;?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">E-mail</label>
					<div class="controls">
						<?php echo $contacto->mail;?>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Eliminar',
		        			'class'=>'btn btn-info'
		        		)); 
		        		echo "&nbsp;";
		        		echo anchor("contactos/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>