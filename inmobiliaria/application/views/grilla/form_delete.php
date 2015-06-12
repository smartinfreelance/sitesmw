<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('inmuebles' , 'Inmuebles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Inmueble</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('inmuebles/deleteInmueble'); ?>
		<input type="hidden" id = "id_inmueble" name="id_inmueble" value="<?php echo $inmueble->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Inmueble?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Tipo</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->tipo_inmueble; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Operacion</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->operacion; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Ubicacion Geografica</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->nombre_provincia." ".$inmueble->nombre_departamento." ".$inmueble->nombre_localidad; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Direccion</label>
					<div class="controls">
						<div>
							<?php 
								echo $inmueble->direccion;
								if($inmueble->tipo_inmueble == "Casa"){
									", Piso: ".$inmueble->piso.", Depto: ".$inmueble->depto; 
								}								
							?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Descripcion</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->descripcion; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Precio</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->moneda.$inmueble->precio; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Contacto</label>
					<div class="controls">
						<div>
							<?php echo $inmueble->contacto; ?>
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
		        		echo anchor("inmuebles/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>