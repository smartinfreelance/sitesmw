<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('inmuebles' , 'Inmuebles');?><span class="divider">&raquo;</span></li>
  			<li class="active">Fotos de Inmueble</li>
		</ul>
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>Fotos de Inmueble</h5>
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
					<label class="control-label" for="typehead">Direccion</label>
					<div class="controls">
						<div>
							<?php 
								echo $inmueble->direccion;
								if($inmueble->tipo_inmueble != "Casa"){
									", Piso: ".$inmueble->piso.", Depto: ".$inmueble->depto; 
								}
								echo ", ".$inmueble->nombre_localidad.", ".$inmueble->nombre_departamento.", ".$inmueble->nombre_provincia;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_open_multipart('inmuebles/cargar_foto');?>
		<input type="hidden" id = "id_inmueble" name="id_inmueble" value="<?php echo $inmueble->id; ?>">
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="control-group">
					<label class="control-label" for="typehead">Fotos Asignadas Actualmente</label>
					<div class="controls">
						<div>
							<?php 
								$x = 0;
								$limite = 6;
								foreach($fotos as $f){
									$x++;
							?>
									<img src = "<?php echo base_url().$f->path_thumb; ?>" alt = "<?php echo $f->direccion_inmueble; ?>" align = "center" style = "width:100px;heigth:100px;"/>
									<?php echo anchor("inmuebles/eliminarFoto/".$inmueble->id."/".$f->id, 'Eliminar', array("class"=>'btn btn-warning')); ?>
									<br />
									
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<?php
					if($x < $limite){
				?>
					<?php
						if(isset($error)){
					?>
						<div class="widget-box">
							<div class="alert alert-error fade in">
								<strong><?php echo $error['error']; ?></strong>
							</div>
						</div>
					<?php
						}
					?>
					<div class="widget-content">
						<div class="widget-box">
							<div class="widget-head">
								<h5> Agregar Foto</h5>
							</div>
							<form class="form-horizontal well">
								<fieldset>
									<div class="control-group">
										<div class="controls">
											<div id="uniform-undefined" class="uni-uploader">
												<input style="opacity: 0;" size="19" class="input-file" type="file" name = "userfile" id = "userfile">
												<span style="-moz-user-select: none;" class="filename">No hay imagenes seleccionadas</span>
												<span style="-moz-user-select: none;" class="action">Selceccionar fotos</span>
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
							        		echo anchor("inmuebles/index", 'Cancelar', array("class"=>'btn btn-warning'));
							        	?>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				<?php
					}else{
				?>
					<div class="widget-box">
						<div class="alert alert-error fade in">
							Ha llegado al limite de fotos. 
						</div>
					</div>
				<?php
					}
				?>
				<div class="form-actions">
					<?php echo anchor("inmuebles/formEditInmueble/".$inmueble->id, 'Volver a Edicion de Inmueble', array("class"=>'btn btn-warning')); ?>
				</div>

			</div>
		</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
	</div>
</div>