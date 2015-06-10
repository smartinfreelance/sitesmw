<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('fotos' , 'Fotos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Eliminar Foto</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('fotos/deleteFoto'); ?>
		<input type="hidden" id = "id_foto" name="id_foto" value="<?php echo $foto->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5>¿Desea eliminar Foto?</h5>
				</div>
				<div class="control-group">
					<label class="control-label" for="typehead">Nombre</label>
					<div class="controls">
						<div>
							<?php echo $foto->nombre; ?>
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
		        		echo anchor("fotos/index", 'Cancelar', array("class"=>'btn btn-warning')); 
		        	?>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>