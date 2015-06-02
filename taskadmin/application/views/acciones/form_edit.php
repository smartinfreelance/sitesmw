<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('acciones' , 'Acciones');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Accion</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('acciones/editAccion'); ?>
		<input type="hidden" name="id_accion" value="<?php echo $accion->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Editar Accion</h5>
				</div>
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php if(set_value('nombre')!=""){ echo set_value('nombre');}else{echo $accion->nombre;} ?>"  maxlength="50">
										<input type="hidden" class="input-xlarge" id="nombre_check" name ="nombre_check" value = "<?php echo $accion->nombre; ?>"  maxlength="50">
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Editar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("acciones/index", 'Cancelar', array("class"=>'btn btn-warning'));
						        	?>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>