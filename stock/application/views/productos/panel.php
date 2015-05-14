<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Productos</li>
		</ul>
		<?php echo anchor(
							'productos/addProducto',
							"Agregar Producto", 
							array("class"=>'btn btn-success')); 
		?><br />
		<br />
		<div class='container' align='center'>
			<ul class = 'breadcrumb'>
				<li>
					<?php echo $links; ?>
				</li>
			</ul>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						#ID
					</th>
					<th>
						Nombre
					</th>
					<th>
						Categoria
					</th>
					<th>
						Precio
					</th>							
					<th>
						Estado Stock
					</th>							
					<th>
						Stock
					</th>							
					<th>
						Stock Minimo
					</th>			
					<th>
						Maximo Stock
					</th>
					<th>
						Acciones
					</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($productos as $p){
			?>
				<tr>
					<td>
			<?php				
					echo $p->id;
			?>
					</td>
					<td>
			<?php
					echo $p->nombre;
			?>
					</td>
					<td>
			<?php
					echo $p->categoria;
			?>
					</td>
					<td>
			<?php
					echo $p->precio;
			?>
					</td>
					<td>
			<?php
					if($p->stock > $p->stock_min){
						if($p->stock > $p->stock_max){
							echo "<span class='label label-warning'>Exceso</span>";
						}else{
							echo "<span class='label label-success'>Suficiente</span>";
						}
					}else if($p->stock < $p->stock_min){
						echo "<span class='label label-important'>Faltante</span>";
					}else{
						echo "Tenemos el stock minimo";
					}
			?>
					</td>
					<td>
			<?php
					echo $p->stock;
			?>
					</td>
					<td>
			<?php
					echo $p->stock_min;
			?>
					</td>
					<td>
			<?php
					echo $p->stock_max;
			?>
					</td>
					<td>
			<?php
					echo anchor("productos/editProducto/".$p->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("productos/eliminarProducto/".$p->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Producto")); 
			?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>