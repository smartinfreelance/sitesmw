<div id = "main-content">
	<div class = "container">	
		<div class="nonboxy-widget">
			<div class="widget-head">
				<h5>Agregar una pregunta</h5>
			</div>
			<div class="widget-content">
				<div class="widget-box">
					<?php echo form_open('topics/confirmAddPregunta', array("id" => "addTopic", "class" => "form-horizontal well")); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="input01">Titulo</label>
								<div class="controls">
									<?php echo $titulo; ?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Descripcion</label>
								<div class="controls">
									<?php echo $descripcion; ?>
								</div>
							</div>
							<hr />
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