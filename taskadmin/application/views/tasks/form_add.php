<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('tasks' , 'Tasks');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Task</li>
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
		<?php echo form_open('tasks/addTask'); ?>
		<br/>	
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Agregar Task</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php echo set_value('nombre'); ?>" maxlength="50">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="control">
						<div>
							<textarea rows="5" class="input-xlarge" id="descripcion" name ="descripcion" maxlength="2000"><?php echo set_value('descripcion'); ?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Demora</label>
					<div class="control">
						<div>
							Dias <input type="text" placeholder = "0" style = "width:25px" id="demora" name ="demora" value = "<?php echo set_value('demora'); ?>" maxlength="10" >
							Horas<input type="text" placeholder = "0" style = "width:25px" id="demora" name ="demora" value = "<?php echo set_value('demora'); ?>" maxlength="10">
							Minutos<input type="text" placeholder = "0" style = "width:25px" id="demora" name ="demora" value = "<?php echo set_value('demora'); ?>" maxlength="50">
							<p class="help-block">(Ejemplo: 2h 20m)</p>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Demora actual</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="demora_actual" name ="demora_actual" value = "<?php echo set_value('demora_actual'); ?>" maxlength="50">
							<p class="help-block">(Ejemplo: 2h 20m)</p>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Proyecto</label>
					<div class="control">
						<div>
							<select id = "id_proyecto" name = "id_proyecto" >
								<option value = ""<?php if(set_value('id_proyecto')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($proyectos as $p){
							?>
								<option value = "<?php echo $p->id?>" <?php if(set_value('id_proyecto')==$p->id){ echo "selected = 'true'"; } ?> ><?php echo $p->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tipo</label>
					<div class="control">
						<div>
							<select id = "id_ttask" name = "id_ttask" >
								<option value = ""<?php if(set_value('id_ttask')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($ttasks as $tt){
							?>
								<option value = "<?php echo $tt->id?>" <?php if(set_value('id_ttask')==$tt->id){ echo "selected = 'true'"; } ?> ><?php echo $tt->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Estado</label>
					<div class="control">
						<div>
							<select id = "id_estado" name = "id_estado" >
								<option value = ""<?php if(set_value('id_estado')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($estados as $e){
							?>
								<option value = "<?php echo $e->id?>" <?php if(set_value('id_estado')==$e->id){ echo "selected = 'true'"; } ?> ><?php echo $e->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario Asignado</label>
					<div class="control">
						<div>
							<select id = "id_usuario" name = "id_usuario" >
								<option value = ""<?php if(set_value('id_usuario')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($usuarios as $u){
							?>
								<option value = "<?php echo $u->id?>" <?php if(set_value('id_usuario')==$u->id){ echo "selected = 'true'"; } ?> ><?php echo $u->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Agregar',
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