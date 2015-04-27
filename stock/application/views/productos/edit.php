<?php echo validation_errors(); ?>
<?php echo form_open('productos/confirmEditProducto'); ?>
<input type="hidden" name="id" value="<?php echo $idProducto; ?>">
<br/>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Nombre" name="nombre" value="<?php 
																					if($producto->nombre){
																						echo $producto->nombre;
																					}else{
																						echo set_value('nombre'); 
																					}
																				?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Precio" name="precio" value="<?php 
																					if($producto->precio){
																						echo $producto->precio;
																					}else{
																						echo set_value('precio'); 
																					}
																				?>">
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
						<option value = '<?php echo $c->id; ?>' <?php 
																	if($producto->id_categoria){
																		if($producto->id_categoria == $c->id){
																			echo "selected = 'selected'";
																		}
																	}else{
																		if((set_value('precio')) == $c->id){
																			echo "selected = 'selected'";
																		}
																	}
																?>
						><?php echo $c->nombre; ?></option>
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
					<input type="text" placeholder="Stock" name="stock" value="<?php 
																					if($producto->stock){
																						echo $producto->stock;
																					}else{
																						echo set_value('stock'); 
																					}
																				?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Stock Minimo" name="stock_min" value="<?php 
																							if($producto->stock_min){
																								echo $producto->stock_min;
																							}else{
																								echo set_value('stock_min'); 
																							}
																						?>">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Stock Maximo" name="stock_max" value="<?php 
																							if($producto->stock_max){
																								echo $producto->stock_max;
																							}else{
																								echo set_value('stock_max'); 
																							}
																						?>">
				</div>
			</div>
		</div>		
		<div class="clearfix">
            <?php 
            	echo anchor("productos/index", 'Cancelar'); 
        		echo form_submit(array(
        			'value'=>'Editar',
        			'class'=>'login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>