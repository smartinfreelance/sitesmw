<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('tcomentarios' , 'TComentarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Comentario</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('tcomentarios/deleteTComentario'); ?>
		<input type="hidden" id = "id_tcomentario" name="id_tcomentario" value="<?php echo $tcomentario->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Comentario?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tarea</label>
					<div class="control">
						<div>
							<?php echo $tcomentario->nombre_task; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario</label>
					<div class="control">
						<div>
							<?php echo $tcomentario->nombre_usuario." ".$tcomentario->apellido_usuario; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Comentario</label>
					<div class="control">
						<div>
							<?php echo $tcomentario->comentario; ?>
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
		        		echo anchor("tcomentarios/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>