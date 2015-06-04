<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('thistoriales' , 'THistoriales');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar THistorial</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('thistoriales/deleteTHistorial'); ?>
		<input type="hidden" id = "id_thistorial" name="id_thistorial" value="<?php echo $thistorial->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar THistorial?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Log</label>
					<div class="control">
						<div>
							<?php echo $thistorial->log; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tarea</label>
					<div class="control">
						<div>
							<?php echo $thistorial->task; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Accion</label>
					<div class="control">
						<div>
							<?php echo $thistorial->accion; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario</label>
					<div class="control">
						<div>
							<?php echo $thistorial->nombre_usuario." ".$thistorial->apellido_usuario; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Estado</label>
					<div class="control">
						<div>
							<?php echo $thistorial->nombre_estado; ?>
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
		        		echo anchor("thistoriales/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>