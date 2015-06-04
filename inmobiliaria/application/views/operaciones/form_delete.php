<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('operaciones' , 'Operaciones');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Operacion</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('operaciones/deleteOperacion'); ?>
		<input type="hidden" id = "id_operacion" name="id_operacion" value="<?php echo $operacion->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Operacion?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="controls">
						<div>
							<?php echo $operacion->nombre; ?>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Eliminar',
		        			'class'=>'btn btn-info'
		        		)); 
		        		echo "&nbsp;";
		        		echo anchor("operaciones/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>