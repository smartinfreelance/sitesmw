 <div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('productos' , 'Productos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Borrar Producto</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('productos/confirmEliminarProducto'); ?>
		<input type="hidden" name="id" value="<?php echo $idProducto; ?>">
		<br/>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Nombre</label>
						<?php echo $producto->nombre; ?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Precio</label>
						<?php echo $producto->precio; ?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Categoria</label>
						<?php echo $producto->categoria; ?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock</label>
						<?php echo $producto->stock; ?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock Minimo</label>
						<?php echo $producto->stock_min; ?>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Stock Maximo</label>
						<?php echo $producto->stock_max; ?>
					</div>
				</div>		
				<div class="clearfix">
		            <?php 
		            	echo anchor("productos/index", 'Cancelar', array("class"=>'btn'));
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Eliminar',
		        			'class'=>'btn-inverse'
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