<?php echo validation_errors(); ?>
<?php echo form_open('productos/confirmAddProducto'); ?>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Precio" name="precio" value="<?php echo set_value('precio'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<select id = "id_categoria" name = "id_categoria">
					<?php
						foreach($categorias as $c){
					?>
						<option value = '<?php echo $c->id; ?>'><?php echo $c->nombre; ?></option>
					<?php						
						}
					?>
					</select>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Stock" name="stock" value="<?php echo set_value('stock'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Stock Minimo" name="stock_min" value="<?php echo set_value('stock_min'); ?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Stock Maximo" name="stock_max" value="<?php echo set_value('stock_max'); ?>">
				</div>
			</div>
		</div>		
		<div class="clearfix">
            <?php 
            	echo anchor("productos/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Agregar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>