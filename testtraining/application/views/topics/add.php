<script type="text/javascript">
	$(document).ready(function() {
		$("#addTopic").validate();
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
							<hr />
							<?php
								for($p = 1; $p <= 10; $p++){
							?>
							<h5>Pregunta <?php echo $p; ?></h5>
							<div class="control-group">
								<label class="control-label" for="input01"></label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder = "Pregunta" maxlength = "600" id="preg<?php echo $p; ?>" name = "preg<?php echo $p; ?>" type="text" required>
								</div>
							</div>

							<?php

									for($r = 1; $r <= 4; $r++){

							?>
							<div class="control-group">
								<label class="control-label" for="input01">
								<?php
									if($r=="1"){
										echo "Correcta";
									}else{
										echo "Incorrecta #".($r-1);
									}
								?>
								</label>
								<div class="controls">
									<input class="input-xlarge text-tip" placeholder="Respuesta <?php echo $r; ?>" maxlength = "300" id="respuesta<?php echo $p; ?>-<?php echo $r; ?>" name = "respuesta<?php echo $p; ?>-<?php echo $r; ?>" type="text" required>
								</div>
							</div>
							<?php

									}

							?>
							<hr />
							<?php
								}

							?>
							<div class="control-group">
								<label class="control-label">Mas Preguntas?</label>
								<div class="controls">
									<label class="checkbox">
									<input name = "mas_preguntas" type="checkbox" value="si" checked = "checked">Si</label>
								</div>
							</div>

						</fieldset>
						<div class="form-actions">
							<?php 
				            	echo anchor("preguntas/index", 'Cancelar', array("class"=>'btn')); 
				            	echo "&nbsp;";
				        		echo form_submit(array(
				        			'value'=>'Crear',
				        			'class'=>'btn btn-inverse'
				        		)); 
				        		echo "&nbsp;";
				        		//echo anchor("", 'Crear y agregar mas preguntas', array("id"=>"addTopicAndMoreQ","class"=>'btn btn-inverse')); 
				        	?>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>