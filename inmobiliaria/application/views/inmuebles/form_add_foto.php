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
							$x=0;
							$limite = 6; //De ser mas de 6, el limite, deben agregarse lineas de js para que funcionen los modals.
							foreach($fotos as $f){
								$x++;
						?>
								<a href = "#" id = "pop<?php echo $x; ?>">
									<img src = "<?php echo base_url().$f->path_thumb; ?>" alt = "<?php echo $f->direccion_inmueble; ?>"/>
								</a>
								<a href = "#" class ='btn btn-warning' id= 'del<?php echo $x; ?>'>Eliminar</a>
								<div class="modal fade" id="imagemodal<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="titleStandard"><?php echo $inmueble->direccion; ?></h4>
												<div id="titleDelete"><h4 class="modal-title">¿Desea eliminar esta foto?</h4></div>
											</div>
											<div class="modal-body">
												<img src="<?php echo base_url().$f->path; ?>" id = "imagepreview<?php echo $x;?>" style = "center">
											</div>
											<div class="modal-footer">
												<div class="form-actions" id = "buttonPop<?php echo $x; ?>">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
												</div>
												<div class="form-actions" id = "buttonDelete<?php echo $x; ?>">
													<?php 
										        		echo anchor("inmuebles/eliminarFoto/".$inmueble->id."/".$f->id, 'Eliminar', array("class"=>'btn btn-info', "id" => "buttonDelete".$x)); 
										        	?>
										        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
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
							        		//echo anchor("inmuebles/index", 'Cancelar', array("class"=>'btn btn-warning'));
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
					<?php echo anchor("inmuebles/index/", 'Ver Inmuebles', array("class"=>'btn btn-warning')); ?>
				</div>

			</div>
		</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
	</div>
</div>
<script type="text/javascript">  
	$(document).ready(function() { 
		$("#pop1").on("click", function() {
			$('#imagepreview1').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal1').modal('show'); 
   			$("#buttonDelete1").css('display','none');
			$("#buttonPop1").css('display','block');
			$("#titleDelete").css('display','none');
   		});
   		$("#pop2").on("click", function() {
			$('#imagepreview2').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal2').modal('show'); 
   			$("#buttonDelete2").css('display','none');
			$("#buttonPop2").css('display','block');
			$("#titleDelete").css('display','none');

   		});
		$("#pop3").on("click", function() {
			$('#imagepreview3').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal3').modal('show'); 
   			$("#buttonDelete3").css('display','none');
			$("#buttonPop3").css('display','block');
			$("#titleDelete").css('display','none');
   		});
   		$("#pop4").on("click", function() {
			$('#imagepreview4').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal4').modal('show');  
   			$("#buttonDelete4").css('display','none');
			$("#buttonPop4").css('display','block');
			$("#titleDelete").css('display','none');	
   		});
   		$("#pop5").on("click", function() {
			$('#imagepreview5').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal5').modal('show');  
   			$("#buttonDelete5").css('display','none');
			$("#buttonPop5").css('display','block');
			$("#titleDelete").css('display','none');	
   		});
   		$("#pop6").on("click", function() {
			$('#imagepreview6').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal6').modal('show');  
   			$("#buttonDelete6").css('display','none');
			$("#buttonPop6").css('display','block');
			$("#titleDelete").css('display','none');	
   		});
   		$("#del1").on("click", function() {
			$('#imagepreview1').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal1').modal('show'); 
   			$("#buttonDelete1").css('display','block');
			$("#buttonPop1").css('display','none');
			$("#titleDelete").css('display','block');		
   		});
   		$("#del2").on("click", function() {
			$('#imagepreview2').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal2').modal('show'); 
   			$("#buttonDelete2").css('display','block');
			$("#buttonPop2").css('display','none');
			$("#titleDelete").css('display','block');				

   		});
		$("#del3").on("click", function() {
			$('#imagepreview3').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal3').modal('show'); 
   			$("#buttonDelete3").css('display','block');
			$("#buttonPop3").css('display','none');
			$("#titleDelete").css('display','block');				
   		});
   		$("#del4").on("click", function() {
			$('#imagepreview4').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal4').modal('show');  
   			$("#buttonDelete4").css('display','block');
			$("#buttonPop4").css('display','none');
			$("#titleDelete").css('display','block');					
   		});
   		$("#del5").on("click", function() {
			$('#imagepreview5').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal5').modal('show');  
   			$("#buttonDelete5").css('display','block');
			$("#buttonPop5").css('display','none');
			$("#titleDelete").css('display','block');				
   		});
   		$("#del6").on("click", function() {
			$('#imagepreview6').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   			$('#imagemodal6').modal('show');  
   			$("#buttonDelete6").css('display','block');
			$("#buttonPop6").css('display','none');
			$("#titleDelete").css('display','block');					
   		});
		$("#buttonDelete1").css('display','none');
		$("#buttonDelete2").css('display','none');
		$("#buttonDelete3").css('display','none');
		$("#buttonDelete4").css('display','none');
		$("#buttonDelete5").css('display','none');
		$("#buttonDelete6").css('display','none');
		$("#buttonPop1").css('display','block');
		$("#buttonPop2").css('display','block');
		$("#buttonPop3").css('display','block');
		$("#buttonPop4").css('display','block');
		$("#buttonPop5").css('display','block');
		$("#buttonPop6").css('display','block');  

		$("#titleDelete").css('display','none');
	});  
</script> 