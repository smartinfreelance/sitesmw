<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('ttasks' , 'TTasks');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Tipo de Task</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('ttasks/deleteTTask'); ?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> ¿Desea eliminar esta Tipo de Task?</h5>
				</div>
				<br/>
				<input type="hidden" name="id_ttask" value="<?php echo $ttask->id; ?>">
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<?php echo $ttask->nombre; ?>
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Eliminar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("ttasks/index", 'Cancelar', array("class"=>'btn btn-warning'));
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