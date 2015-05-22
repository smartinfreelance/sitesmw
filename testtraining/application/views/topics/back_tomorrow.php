<div id = "main-content">
	<div class = "container">	
		<div class="row">
			<div class="page-header">
				<h1><?php echo $titulo; ?><small><?php echo $descripcion; ?></small></h1>
			</div>
		</div>
		<div class="widget-head">
			<h5 class="pull-left"> Mis puntajes de hoy</h5> 
		</div>

		<table class="table table-default table-bordered">
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						Nombre
					</th>
					<th>
						Apeliido
					</th>
					<th>
						Puntuacion
					</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$pos = 0;
				foreach($scores as $s){
					$pos++;
			?>	
				<tr>
					<td>
			<?php 
				echo $pos; 
				if($pos == 1){
			?>
				<span class="color-icons trophy_co"></span>
			<?php
				}else if($pos == 2){
			?>
				<span class="color-icons trophy_silver_co"></span>
			<?php

				}else if($pos == 3){
			?>
				<span class="color-icons trophy_bronze_co"></span>
			<?php
				}
			?>
					</td>
					<td>
			<?php echo $s->nombre_usuario; ?>
					</td>
					<td>
			<?php echo $s->apellido_usuario; ?>
					</td>
					<td>
			<?php echo round($s->puntos,2)."pts."; ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<?php echo anchor("preguntas/index","Menu Principal", array("class"=>"btn btn-large")); ?>
	</div>
</div>	