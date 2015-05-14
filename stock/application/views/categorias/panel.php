<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Categorias</li>
		</ul>
		<?php echo anchor(
					'categorias/addCategoria',
					"Agregar Categoria", 
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
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
		<?php
			foreach($categorias as $c){
		?>
				<tr>
					<td>
		<?php					
				echo $c->id;
		?>
				</td>
				<td>
		<?php
				echo $c->nombre;
		?>
				</td>
				<td>
		<?php
				echo anchor("categorias/editCategoria/".$c->id, '<i class="icon-edit"></i>'); 
				echo "&nbsp; &nbsp; &nbsp;";
				echo anchor("categorias/eliminarCategoria/".$c->id, '<i class="icon-trash"></i>');
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