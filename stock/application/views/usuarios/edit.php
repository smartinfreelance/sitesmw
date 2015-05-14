<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('usuarios' , 'Usuarios');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Usuario</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('usuarios/confirmEditUsuario'); ?>
		<input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
		<br/>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Usuario" name="usuario" value="<?php 
																							if($usuario->usuario){
																								echo $usuario->usuario;
																							}else{
																								echo set_value('usuario'); 
																							}
																						?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre" name="nombre" value="<?php 
																							if($usuario->nombre){
																								echo $usuario->nombre;
																							}else{
																								echo set_value('nombre'); 
																							}
																						?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Apellido" name="apellido" value="<?php 
																							if($usuario->apellido){
																								echo $usuario->apellido;
																							}else{
																								echo set_value('apeliido'); 
																							}
																						?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="DNI" name="dni" value="<?php 
																						if($usuario->dni){
																							echo $usuario->dni;
																						}else{
																							echo set_value('dni'); 
																						}
																					?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Fecha de Nacimiento" name="fecha_nac" value="<?php 
																											if($usuario->fecha_nac){
																												echo $usuario->fecha_nac;
																											}else{
																												echo set_value('fecha_nac'); 
																											}
																						?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Mail" name="mail" value="<?php 
																						if($usuario->mail){
																							echo $usuario->mail;
																						}else{
																							echo set_value('mail'); 
																						}
																					?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<select id = "id_rol" name = "id_rol">
							<?php
								foreach($roles as $r){
							?>
								<option value = '<?php echo $r->id; ?>' <?php 
																			if($usuario->id_rol){
																				if($usuario->id_rol == $r->id){
																					echo "selected = 'selected'";
																				}
																			}else{
																				if((set_value('id_rol')) == $r->id){
																					echo "selected = 'selected'";
																				}
																			}
																		?>
								><?php echo $r->nombre; ?></option>
							<?php						
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		            	echo anchor("usuarios/index", 'Cancelar', array("class"=>'btn btn-inverse'));
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Editar',
		        			'class'=>'btn'
		        		)); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>