<script type="text/javascript">
	$(document).ready(function() {
		$("#addTopic").validate({
		  rules: {
		    resp1: { required: true },resp2: { required: true },resp3: { required: true },resp4: { required: true },resp5: { required: true },
		    resp6: { required: true },resp7: { required: true },resp8: { required: true },resp9: { required: true },resp10: { required: true }
		  }
		});
	});	
</script>
<div id = "main-content">
	<div class = "container">	
		<div class="nonboxy-widget">
			<div class="widget-head">
				<h5>Nuevo Topic</h5>
			</div>
			<div class="widget-content">
				<div class="widget-box">
					<?php echo form_open('topics/confirmAddTopic', array("id" => "addTopic", "class" => "form-horizontal well")); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="input01">Titulo</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="" id="titulo" maxlength = "200" name="titulo" type="text" required>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Descripcion</label>
								<div class="controls">
									<textarea class="input-xlarge" rows="3" id = "descripcion" maxlength = "1000" name = "descripcion" required></textarea>
								</div>
							</div>

							<?php
								for($p = 1; $p <= 10; $p++){
							?>
							<div class="control-group">
								<label class="control-label" for="input01">Pregunta <?php echo $p; ?></label>
								<div class="controls">
									<input class="input-xlarge text-tip" maxlength = "600" id="preg<?php echo $p; ?>" name = "preg<?php echo $p; ?>" type="text" required>
								</div>
							</div>

							<?php

									for($r = 1; $r <= 4; $r++){

							?>
							<div class="control-group">
								<label class="control-label" for="input<?php echo $p; ?>-<?php echo $r; ?>">Correcta <input value="<?php echo $r; ?>" name="resp<?php echo $p; ?>" id = "resp<?php echo $p; ?>-<?php echo $r; ?>" type="radio"></label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="Respuesta <?php echo $r; ?>" maxlength = "300" id="respuesta<?php echo $p; ?>-<?php echo $r; ?>" name = "respuesta<?php echo $p; ?>-<?php echo $r; ?>" type="text" required>
								</div>
							</div>


							<?php

									}


								}

							?>

						</fieldset>
						<div class="form-actions">
							<?php 
				            	echo anchor("categorias/index", 'Cancelar', array("class"=>'btn')); 
				            	echo "&nbsp;";
				        		echo form_submit(array(
				        			'value'=>'Crear',
				        			'class'=>'btn btn-inverse'
				        		)); 
				        		echo "&nbsp;";
							?>
							<button id = "addTopicAndMoreQ" name = "addTopicAndMoreQ" class = "btn btn-inverse"> Comprobar</button>
							<?php
				        		//echo anchor("", 'Crear y agregar mas preguntas', array("id"=>"addTopicAndMoreQ","class"=>'btn btn-inverse')); 
				        	?>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>