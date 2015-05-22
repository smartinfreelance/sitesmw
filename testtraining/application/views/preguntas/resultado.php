<div id = "main-content">
	<div class = "container">	
		<div class="row">
			<div class="page-header">
				<h1><?php echo $titulo; ?><small><?php echo $descripcion; ?></small></h1>
			</div>
		</div>
		<dl class="dl-horizontal">
			<dt>Correctas</dt>
			<dd><?php echo $correctas."/".$total; ?></dd>
			<dt>Incorrectas</dt>
			<dd><?php echo $total-$correctas; ?></dd>
			<dt>Porcentaje</dt>
			<dd><?php echo $porcentaje."%"; ?></dd>
			<dt>Puntos Obtenidos</dt>
			<dd><?php echo $puntos; ?></dd>
			<?php
				if($calificacion == 0){
			?>
		</dl>
			<hr />

				<h5>Calificar Curso</h5>
				<?php 	echo form_open('topics/calificar'); ?>
				<div class="control-group">
					<label class="control-label" for="input01">Mi calificacion</label>
					<div class="controls">
						<input type="hidden" name="id_topic" id ="id_topic" value = <?php echo $id_topic; ?>>
						<select id = "calificacion" name = "calificacion">
							<option value = "1">1 Estrella</option>
							<option value = "2">2 Estrellas</option>
							<option value = "3">3 Estrellas</option>
							<option value = "4">4 Estrellas</option>
							<option value = "5">5 Estrellas</option>
						</select>
						<br />
						<?php 
							echo form_submit(array(
								'value'=>'Calificar',
								'id' => 'boton_calificar',
								'class'=>'btn'
							)); 
						?>
					</div>
				</div>
			<?php
				}else{
			?>
				<dt>Calificacion</dt>
				<dd><?php echo $calificacion; ?></dd>
			<?php
				}
			?>
		</dl>
		<hr />
		<?php
			if($vidas > 0){
				echo anchor("preguntas/".$modo."/".$id_topic,"Volver a intentarlo (".$vidas.")", array("class"=>"btn btn-large"));
				echo "<br />";
			}
			echo anchor("preguntas/index","Menu Principal", array("class"=>"btn btn-large"));
		?>
	</div>
</div>	