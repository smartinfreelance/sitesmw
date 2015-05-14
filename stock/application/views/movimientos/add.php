<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li><?php echo anchor('movimientos' , 'Movimientos');?><span class="divider">&raquo;</span></li>
  			<li class="active">Agregar Movimiento</li>
		</ul>
		<?php echo validation_errors(); ?>
		<?php echo form_open('movimientos/confirmAddMovimiento'); ?>
		<div class="widget-content">
			<div class="widget-box">
				<div class="control-group">
					<div class="controls">
						<table>
							<tr>
								<td>
									<label class="control-label">Tipo</label>
									<select  name = "tipo" id = "tipo">
										<option value = "Entrada">Entrada</option>
										<option value = "Salida">Salida</option>
									</select>
								</td>
								<td>
									<label class="control-label">Descripcion</label>
									<input type="text" name="descripcion" value="<?php echo set_value('descripcion'); ?>">
								</td>
								<td>

								</td>
							</tr>
							<tr>
								<td>
									<label class="control-label">Categoria</label>
									<select id="categorias">
										<option value = "0" selected="selected">Seleccione una Categoria</option>
										<?php
											foreach ($categorias as $c) {
										?>
											<option value = "<?php echo $c->id; ?>"><?php echo $c->nombre;?></option>
										<?php
											}
										?>
										
									</select>
								</td>
								<td>
									<label class="control-label">Producto</label>
									<select name="id_producto" id="id_producto">  
										<option value="">Seleccione un producto</option>  
									</select>
								</td>
								<td>
									<label class="control-label">Cantidad</label>
									<input type="text" name="cantidad" id = "cantidad" class="span1" value="<?php echo set_value('descripcion'); ?>">
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		            	echo anchor("movimientos/index", 'Cancelar', array("class"=>'btn')); 
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
<script type="text/javascript">  
      $(document).ready(function() { 
      	$("#categorias").val('0');  
        $("#categorias").change(function(){  
        /*dropdown post *///  
		        $.ajax({  
		            url:"<?php echo base_url();?>index.php/movimientos/buildDropDownProd",  
		            data: {id: $(this).val()},  
		            type: "POST",  
		            success:function(data){  
		            	$("#id_producto").html(data);  
		         	}  
		      	});  
		   	});  
		});  
</script> 