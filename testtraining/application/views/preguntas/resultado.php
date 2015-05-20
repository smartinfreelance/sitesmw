<div id = "main-content">
	<div class = "container">	
		<div class="row">
			<div class="page-header">
				<h1><?php echo $titulo; ?></h1>
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
			</dl>
		<?php
			echo anchor("preguntas/".$modo."/".$id_topic,"Volver a intentarlo", array("class"=>"btn btn-large"));
			echo "<br />";
			echo anchor("preguntas/index","Menu Principal", array("class"=>"btn btn-large"));
		?>
	</div>
</div>	