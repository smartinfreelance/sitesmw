<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('tcomentarios' , 'TComentarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar TComentario</li>
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
		<?php echo form_open('tcomentarios/editTComentario'); ?>
		<input type="hidden" name="id_tcomentario" value="<?php echo $tcomentario->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Editar TComentario</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tarea</label>
					<div class="control">
						<div>
							<select id = "id_task" name = "id_task" autocomplete = "off">
								<option value = ""<?php if(set_value('id_task')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($tasks as $t){
							?>
								<option value = "<?php echo $t->id?>" <?php echo populateSelect(set_value('id_task'),$tcomentario->id_task,$t->id); ?> ><?php echo $t->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario</label>
					<div class="control">
						<div>
							<select id = "id_usuario" name = "id_usuario" autocomplete = "off">
								<option value = ""<?php if(set_value('id_usuario')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($usuarios as $u){
							?>
								<option value = "<?php echo $u->id?>" <?php echo populateSelect(set_value('id_usuario'),$tcomentario->id_usuario,$u->id); ?> ><?php echo $u->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Comentario</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="comentario" name ="comentario" value = "<?php echo populateText(set_value('comentario'),$tcomentario->comentario); ?>" maxlength="50">
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