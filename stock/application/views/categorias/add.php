<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('categorias' , 'Categorias');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Categoria</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('categorias/confirmAddCategoria'); ?>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Nombre</label>
						<input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>">
					</div>
				</div>	
				<div class="clearfix">
		            <?php 
		            	echo anchor("categorias/index", 'Cancelar', array("class"=>'btn')); 
		            	echo "&nbsp;";
		        		echo form_submit(array(
		        			'value'=>'Agregar',
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