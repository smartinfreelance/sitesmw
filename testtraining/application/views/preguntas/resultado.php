<div id = "main-content">
	<div class = "container">	
		<?php
			echo "<h3>Usted respondio correctamente ".$correctas." de ".$total." preguntas realizadas.</h3>";
			echo "<br />";
			echo "<h3>Su puntaje obtenido es: ".$porcentaje."%</h3>";
			echo "<br />";
			if($modo == "modoSimulador"){
		?>
			<h1>Preguntas respondidas Correctamente:</h1>
		<?php
				$id_pc = 0;
				$aux = 0;
				foreach($pregCorr as $pc){
		?>
				<p>
					<h5><?php echo $pc[$aux]->pregunta."(".$pc[$aux]->id_pregunta.")"; ?></h5>
				</p>
				<label class = "radio">
					<?php echo $pc[$aux]->respuesta; ?>
				</label>
		<?php
				}
		?>
			<h1>Preguntas respondidas Incorrectamente:</h1>
		<?php
				$id_pi = 0;
				$aux = 0;
				for($i=0 ; $i < count($pregIncorr) ;$i++){
					for($j=0 ; $j < count($pregIncorr[$i]);$j++){
						if($pregIncorr[$i][$j]->id_pregunta != $id_pi){
							$id_pi = $pregIncorr[$i][$j]->id_pregunta;
		?>
				<p>
					<h5><?php echo $pregIncorr[$i][$j]->pregunta."(".$pregIncorr[$i][$j]->id_pregunta.")"; ?></h5>
				</p>
		<?php
						}
		?>
				<label class = "radio" <?php if($pregIncorr[$i][$j]->correcta == 1){ ?> style="color:green" <?php }else{?>  style="color:red" <?php } ?>>
					<?php echo $pregIncorr[$i][$j]->respuesta; ?>
				</label>

		<?php
					}
				}
		?>




		<?php
			}
		?>


		<?php
			echo anchor("preguntas/".$modo."/".$id_topic,"Volver a intentarlo", array("class"=>"btn btn-large"));
			echo "<br />";
			echo anchor("preguntas/index","Menu Principal", array("class"=>"btn btn-large"));
		?>
	</div>
</div>	