<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('acciones' , 'Acciones');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Accion</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('acciones/deleteAccion'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> ¿Desea eliminar esta Accion?</h5>
				</div>
				<br/>
				<input type="hidden" name="id_accion" value="<?php echo $accion->id; ?>">
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<?php echo $accion->nombre; ?>
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Eliminar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("acciones/index", 'Cancelar', array("class"=>'btn btn-warning'));
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