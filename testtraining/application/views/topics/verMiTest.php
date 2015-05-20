<div id = "main-content">
	<div class = "container">	
		<?php
			$aux = 0;
			foreach($preguntas as $p){
				if($aux != $p->id){
					$aux = $p->id;
		?>
					<p>
						<h4><?php echo $p->pregunta; ?></h4>
					</p>
		<?php
				}
				echo "<div>";
				echo $p->respuesta;
				echo "</div>";
				echo "<br />";
			}
		?>
	</div>
</div>	