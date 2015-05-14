<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('movimientos' , 'Movimientos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Movimiento</li>
		</ul>	
		<?php echo validation_errors(); ?>
		<?php echo form_open('movimientos/confirmEditMovimiento'); ?>
		<input type="hidden" name="id" value="<?php echo $idMovimiento; ?>">
		<br/>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Tipo</label>
						<input type="text" name="nombre" value="<?php 
																	if($movimiento->tipo){
																		echo $movimiento->tipo;
																	}else{
																		echo set_value('tipo'); 
																	}
																?>">
					</div>
				</div>	
				<div class="clearfix">
		            <?php 
		            	echo anchor("movimientos/index", 'Cancelar', array("class"=>'btn'));
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Editar',
		        			'class'=>'btn btn-inverse'
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