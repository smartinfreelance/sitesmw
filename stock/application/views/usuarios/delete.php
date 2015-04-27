<?php echo validation_errors(); ?>
<?php echo form_open('productos/confirmEliminarProducto'); ?>
<input type="hidden" name="id" value="<?php echo $idProducto; ?>">
<br/>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->nombre; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->precio; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->categoria; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->stock; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->stock_min; ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<?php echo $producto->stock_max; ?>
				</div>
			</div>
		</div>		
		<div class="clearfix">
            <?php 
            	echo anchor("productos/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Eliminar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>