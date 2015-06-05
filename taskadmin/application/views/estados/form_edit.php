<?php $this->load->view('aux_functions'); ?>
<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('estados' , 'Estados');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Estado</li>
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
		<?php echo form_open('estados/editEstado'); ?>
		<input type="hidden" name="id_estado" value="<?php echo $estado->id; ?>">
		<br/>
		<div class="widget-content">
			<div class="nonboxy-widget">
				<div class="widget-head">
					<h5> Editar Estado</h5>
				</div>
				<div class="widget-content">
					<div class="widget-box">
						<form class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="input01">Nombre</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="nombre" name ="nombre" value = "<?php echo populateText(set_value('nombre'),$estado->nombre); ?>"  maxlength="50">
										<input type="hidden" class="input-xlarge" id="nombre_check" name ="nombre_check" value = "<?php echo $estado->nombre; ?>"  maxlength="50">
									</div>
								</div>
								<div class="form-actions">
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Editar',
						        			'class'=>'btn btn-info'
						        		)); 
						        		echo "&nbsp;";
						        		echo anchor("estados/index", 'Cancelar', array("class"=>'btn btn-warning'));
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