<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('thistoriales' , 'THistoriales');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Historia</li>
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
		<?php echo form_open('thistoriales/addTHistorial'); ?>
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Agregar Historia</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Log</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="log" name ="log" value = "<?php echo set_value('log'); ?>" maxlength="50">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tarea</label>
					<div class="control">
						<div>
							<select id = "id_task" name = "id_task" >
								<option value = ""<?php if(set_value('id_task')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($tasks as $t){
							?>
								<option value = "<?php echo $t->id?>" <?php if(set_value('id_task')==$t->id){ echo "selected = 'true'"; } ?> ><?php echo $t->nombre; ?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Accion</label>
					<div class="control">
						<div>
							<select id = "id_accion" name = "id_accion" >
								<option value = ""<?php if(set_value('id_accion')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
							<?php
								foreach($acciones as $a){
							?>
								<option value = "<?php echo $a->id?>" <?php if(set_value('id_accion')==$a->id){ echo "selected = 'true'"; } ?> ><?php echo $a->nombre; ?></option>
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
				<div class="form-actions">
					<?php 
		        		echo form_submit(array(
		        			'value'=>'Agregar',
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