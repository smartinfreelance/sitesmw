<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('estados' , 'Estados');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Estado</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('estados/deleteEstado'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> ¿Desea eliminar esta Estado?</h5>
				</div>
				<br/>
				<input type="hidden" name="id_estado" value="<?php echo $estado->id; ?>">
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<?php echo $estado->nombre; ?>
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Eliminar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("estados/index", 'Cancelar', array("class"=>'btn btn-warning'));
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