<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('fotos' , 'Fotos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Foto</li>
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
		<?php echo form_open_multipart('fotos/addFoto');?>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Agregar Foto</h5>
				</div>
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<div id="uniform-undefined" class="uni-uploader">
											<input style="opacity: 0;" size="19" class="input-file" type="file" name = "userfile" id = "userfile">
											<span style="-moz-user-select: none;" class="filename">No file selected</span>
											<span style="-moz-user-select: none;" class="action">Choose File</span>
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
						        		echo anchor("fotos/index", 'Cancelar', array("class"=>'btn btn-warning'));
						        	?>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>