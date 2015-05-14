<script type="text/javascript">
	$(document).ready(function() {
		$("#hideAnswers").css( "display", "none" );
		$("#showAnswers").css( "display", "block" );
		$("#showAnswers").click(function() {
			$("div[id^='correct']").css( "color", "green" );
			$("div[id^='wrong']").css( "color", "red" );			
			$("#showAnswers").css( "display", "none" );
			$("#hideAnswers").css( "display", "block" );
		});
		$("#hideAnswers").click(function() {
			$("div[id^='correct']").css( "color", "black" );
			$("div[id^='wrong']").css( "color", "black" );	
			$("#showAnswers").css( "display", "block" );
			$("#hideAnswers").css( "display", "none" );
		});
	});
</script>

<div id = "main-content">
	<div class = "container">	
		<a href = "#" id = "showAnswers" name = "showAnswers" class="btn btn-large">Mostrar Respuestas Correctas</a>
		<a href = "#" id = "hideAnswers" name = "hideAnswers" class="btn btn-large">Ocultar Respuestas Correctas</a>
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
				if($p->correcta == 1){
					echo "<div id = 'correct' name = 'correct'>";
				}else{
					echo "<div id = 'wrong' name = 'wrong'>";
				}
				echo " - ".$p->respuesta;
				echo "</div>";
				echo "<br />";
			}
		?>
	</div>
</div>	