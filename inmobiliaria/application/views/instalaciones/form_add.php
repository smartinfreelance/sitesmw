<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('instalaciones' , 'Instalaciones');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Instalacion</li>
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
		<?php echo form_open('instalaciones/addInstalacion'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Agregar Instalacion</h5>
				</div>
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="continstalacion-group">
									<label class="continstalacion-label" for="input01">Nombre</label>
									<div class="continstalaciones">
										<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php echo populateText(set_value('nombre'),''); ?>">
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Agregar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("instalaciones/index", 'Cancelar', array("class"=>'btn btn-warning'));
						        	?>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>