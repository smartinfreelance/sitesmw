<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('instalaciones' , 'Instalaciones');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Instalacion</li>
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
		<?php echo form_open('instalaciones/editInstalacion'); ?>
		<input type="hidden" name="id_instalacion" value="<?php echo populateText(set_value('id_instalacion'),$instalacion->id); ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Editar Instalacion</h5>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre" name="nombre" value="<?php echo populateText(set_value('nombre'),$instalacion->nombre); ?>">
							<input type="hidden" placeholder="Nombre" name="nombre_check" value="<?php echo populateText(set_value('nombre_check'),$instalacion->nombre); ?>">
						</div>
					</div>
				</div>	
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Editar',
		        			'class'=>'btn btn-info'
		        		)); 
		        		echo "&nbsp;";
		        		echo anchor("instalaciones/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>