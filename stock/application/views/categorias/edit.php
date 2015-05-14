<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('categorias' , 'Categorias');?><span class="divider">&raquo;</span></li>
  			<li class="active">Editar Categoria</li>
		</ul>	
		<?php echo validation_errors(); ?>
		<?php echo form_open('categorias/confirmEditCategoria'); ?>
		<input type="hidden" name="id" value="<?php echo $idCategoria; ?>">
		<br/>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<label class="control-label">Nombre</label>
						<input type="text" name="nombre" value="<?php 
																	if($categoria->nombre){
																		echo $categoria->nombre;
																	}else{
																		echo set_value('nombre'); 
																	}
																?>">
					</div>
				</div>	
				<div class="clearfix">
		            <?php 
		            	echo anchor("categorias/index", 'Cancelar', array("class"=>'btn'));
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