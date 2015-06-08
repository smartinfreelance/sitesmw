<script type="text/javascript">
	$(function() {
		$( "#fecha_nac" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
	});
</script>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('usuarios' , 'Usuarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Usuario</li>
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
		<?php echo form_open('usuarios/addUsuario'); ?>
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Agregar Usuario</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Usuario</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="usuario" name ="usuario" value = "<?php echo set_value('usuario'); ?>" maxlength="50">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Password</label>
					<div class="control">
						<div>
							<input type="password" class="input-xlarge" id="password" name ="password" value = "" maxlength="16">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Confirmar Password</label>
					<div class="control">
						<div>
							<input type="password" class="input-xlarge" id="password_conf" name ="password_conf" value = "" maxlength="16">
						</div>
					</div>
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
					<label class="control-label" for="typehead">Apellido</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="apellido" name ="apellido" value = "<?php echo set_value('apellido'); ?>" maxlength="50">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Rol</label>
					<div class="controls">
						<select id = "id_rol" name = "id_rol" >
							<option value = ""<?php if(set_value('id_rol')==""){ echo "selected = 'selected'"; }?>>Seleccione</option>
						<?php
							foreach($roles as $r){
								if($r->id > 1){
						?>
							<option value = "<?php echo $r->id?>" <?php if(set_value('id_rol')==$r->id){ echo "selected = 'true'"; } ?> ><?php echo $r->nombre; ?></option>
						<?php
								}
							}
						?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">E-mail</label>
					<div class="control">
						<div>
							<input type="text" class="input-xlarge" id="mail" name ="mail" value = "<?php echo set_value('apellido'); ?>" maxlength="50">
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
		        		echo anchor("usuarios/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>