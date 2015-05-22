<div id = "main-content">
	<div class = "container">	
		<div class="row">
			<div class="page-header">
				<h1><?php echo $titulo; ?><small><?php echo $descripcion; ?></small></h1>
			</div>
		</div>
		<div class="widget-head">
			<h5 class="pull-left"> Mejores puntajes de hoy</h5> 
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
				foreach($ranking_pts_hoy as $rank_p_hoy){
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
			<?php echo $rank_p_hoy->nombre_usuario; ?>
					</td>
					<td>
			<?php echo $rank_p_hoy->apellido_usuario; ?>
					</td>
					<td>
			<?php echo round($rank_p_hoy->sum_puntos,2)."pts."; ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
<!-- -->		
		<div class="widget-head">
			<h5 class="pull-left"> Mejores promedios de hoy</h5> 
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
				foreach($ranking_avg_hoy as $rank_a_hoy){
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
			<?php echo $rank_a_hoy->nombre_usuario; ?>
					</td>
					<td>
			<?php echo $rank_a_hoy->apellido_usuario; ?>
					</td>
					<td>
			<?php echo round($rank_a_hoy->avg_puntos,2)."%"; ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
<!-- -->		
		<div class="widget-head">
			<h5 class="pull-left"> Mayor cantidad de puntos acumulados</h5> 
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
				foreach($ranking_pts as $rp){
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
			<?php echo $rp->nombre_usuario; ?>
					</td>
					<td>
			<?php echo $rp->apellido_usuario; ?>
					</td>
					<td>
			<?php echo round($rp->sum_puntos,2)."pts."; ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
<!-- -->		
		<div class="widget-head">
			<h5 class="pull-left"> Mejores promedios</h5> 
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
				foreach($ranking_avg as $ravg){
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
			<?php echo $ravg->nombre_usuario; ?>
					</td>
					<td>
			<?php echo $ravg->apellido_usuario; ?>
					</td>
					<td>
			<?php echo round($ravg->avg_puntos,2)."%"; ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>	