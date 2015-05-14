<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('productos' , 'Productos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Producto</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('productos/confirmAddProducto'); ?>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Nombre</label>
						<input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Precio</label>
						<input type="text" name="precio" value="<?php echo set_value('precio'); ?>">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Categoria</label>
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
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock Actual</label>
						<input type="text" name="stock" value="<?php echo set_value('stock'); ?>">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock Minimo</label>
						<input type="text" name="stock_min" value="<?php echo set_value('stock_min'); ?>">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock Maximo</label>
						<input type="text" name="stock_max" value="<?php echo set_value('stock_max'); ?>">
					</div>
				</div>		
				<div class="clearfix">
		            <?php 
		            	echo anchor("productos/index", 'Cancelar', array("class"=>'btn'));
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Agregar',
		        			'class'=>'btn  btn-inverse'
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