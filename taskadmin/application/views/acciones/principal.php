<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Acciones</li>
		</ul>
		<?php echo anchor(
							'acciones/formAddAccion',
							"Agregar Accion", 
							array("class"=>'btn btn-success')); 
		?><br />
		<br />
		<?php
			if($links!=""){
		?>
				<div class='container' align='center'>
					<ul class = 'breadcrumb'>
						<li>
							<?php echo $links; ?>
						</li>
					</ul>
				</div>
		<?php
			}
		?>
		<?php
			if(count($acciones) > 0){
		?>		
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
					foreach($acciones as $r){
				?>
					<tr>
						<td>
				<?php				
						echo $r->id;
				?>
						</td>
						<td>
				<?php
						echo $r->nombre;
				?>
						</td>
						<td>
				<?php
						echo anchor("acciones/formEditAccion/".$r->id, '<i class="icon-edit"></i>'); 
						echo "&nbsp; &nbsp; &nbsp;";
						echo anchor("acciones/formDeleteAccion/".$r->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Accion")); 
				?>
						</td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		<?php
			}else{
				echo "No hay registros.";
			}
		?>			
	</div>
</div>