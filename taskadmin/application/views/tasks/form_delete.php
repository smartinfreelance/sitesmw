<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('tasks' , 'Tasks');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Task</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('tasks/deleteTask'); ?>
		<input type="hidden" id = "id_task" name="id_task" value="<?php echo $task->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Task?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="control">
						<div>
							<?php echo $task->nombre; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="control">
						<div>
							<?php echo $task->descripcion; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Demora</label>
					<div class="control">
						<div>
							<?php echo $task->demora; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Demora actual</label>
					<div class="control">
						<div>
							<?php echo $task->demora_actual; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Proyecto</label>
					<div class="control">
						<div>
							<?php echo $task->nombre_proyecto; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tipo</label>
					<div class="control">
						<div>
							<?php echo $task->tipo_task; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Estado</label>
					<div class="control">
						<div>
							<?php echo $task->estado_nombre; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Asignado</label>
					<div class="control">
						<div>
							<?php echo $task->nombre_asignado; ?>
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
		        		echo anchor("tasks/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>