<div id = "main-content">
	<div class = "container">	
		<?php
			echo form_open('preguntas/finalizarSimulador'); 
			$id_pregunta = 0;
			$total = 0;
			foreach($preguntas as $p){
				$total++;
				$id_pregunta = $p->id;
		?>
				<p>
					<h5><?php echo $total.") ".$p->pregunta."(".$p->id.")"; ?></h5>
				</p>
				<label class="radio" style = "display:none;">
					<input type="radio" value="0-0" name="pregunta<?php echo $total; ?>" checked = "checked">
						No Responde
				</label>
		<?php
				foreach($respuestas as $r){
					if($r->id_pregunta == $id_pregunta){
		?>
			<label class="radio">
				<input type="radio" value="<?php echo $p->id."-".$r->id; ?>" name="pregunta<?php echo $total; ?>">
					<?php echo $r->respuesta; ?>
			</label>

		<?php

					}
				}
			}
		?>
			<input type = "hidden" id = "id_topic" name = "id_topic" value = "<?php echo $id_topic; ?>" />
		<?php
			echo form_submit(array(
				'value'=>'Finalizar',
				'id' => 'boton_finalizar',
				"class"=>"btn btn-large"
			)); 
			echo form_close();
		?>
		<br />
		<?php echo anchor('preguntas/index/', "Menu");?>
	</div>
</div>