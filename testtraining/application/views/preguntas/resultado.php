<div id = "main-content">
	<div class = "container">	
		<?php
			echo "<h3>Usted respondio correctamente ".$correctas." de ".$total." preguntas realizadas.</h3>";
			echo "<br />";
			echo "<h3>Su puntaje obtenido es: ".$porcentaje."%</h3>";
			echo "<br />";
			echo anchor("preguntas/unaPregunta","Volver a intentarlo", array("class"=>"btn btn-large"));
			echo "<br />";
			echo anchor("preguntas/index","Menu Principal", array("class"=>"btn btn-large"));
		?>
	</div>
</div>	