<div id = "main-content">
	<div class = "container">
		<ul class="breadcrumb">
  			<li class="active">Fotos</li>
		</ul>
		<?php echo anchor(
							'fotos/formAddFoto',
							"Agregar Foto", 
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
				foreach($fotos as $f){
			?>
				<tr>
					<td>
			<?php				
					echo $f->id;
			?>
					</td>
					<td>
			<?php
					echo $f->path;
			?>
					</td>
					<td>
			<?php
					echo anchor("fotos/formEditFoto/".$f->id, '<i class="icon-edit"></i>'); 
					echo "&nbsp; &nbsp; &nbsp;";
					echo anchor("fotos/formDeleteFoto/".$f->id, '<i class="icon-trash"></i>', array("alt"=>"Eliminar Foto")); 
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