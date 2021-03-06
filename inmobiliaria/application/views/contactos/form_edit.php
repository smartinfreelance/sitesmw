<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('contactos' , 'Contactos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar contacto</li>
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
		<?php echo form_open('contactos/editContacto'); ?>
		<input type="hidden" name="id_contacto" value="<?php echo $contacto->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Agregar Contacto</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre" name="nombre" value="<?php echo populateText(set_value('nombre'),$contacto->nombre); ?>" maxlength = "50">
							<input type="hidden" placeholder="Nombre" name="nombre_check" value="<?php echo $contacto->nombre; ?>" maxlength = "50">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Telefono</label>
					<div class="controls">
						<input type="text" class=" input-xlarge" id="telefono" name ="telefono" value="<?php echo populateText(set_value('telefono'),$contacto->telefono); ?>" maxlength="14">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo Contacto</label>
					<div class="controls">
						<select id = "id_tipo" name = "id_tipo">
							<option value = "" <?php echo populateSelect(set_value('id_tipo'),$contacto->id_tipo,""); ?>>Seleccionar</option>
						<?php
							foreach($tcontactos as $tc){
						?>
							<option value ="<?php echo $tc->id; ?>" <?php echo populateSelect(set_value('id_tipo'),$contacto->id_tipo,$tc->id); ?> ><?php echo $tc->nombre; ?></option>
						<?php
							}
						?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">E-mail</label>
					<div class="controls">
						<input type="text" class=" input-xlarge" id="mail" name ="mail" value="<?php echo populateText(set_value('mail'),$contacto->mail); ?>" maxlength="50">
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Editar',
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