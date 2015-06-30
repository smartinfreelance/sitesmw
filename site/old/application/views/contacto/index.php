<section id="content">
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_5">
					<form id="contact-form">
						<div class="contact-form-loader"></div>
							<header>
								<h2><span>Contacto</span></h2>
							</header>
							<fieldset>
							<?php //echo form_open('start/sendConsulta'); ?>
							<form action = "<?php echo base_url(); ?>php/mail.php" method ="post">
								<?php
									if(validation_errors()!=""){
								?>
									<div class="widget-box">
										<div class="alert alert-error fade in">
											<strong><?php echo validation_errors(); ?></strong>
										</div>
									</div>
								<?php
									}
								?>
								<label class="name">
									<span class="text">Nombre:</span>
									<input type="text" name="nombre" placeholder="" value="" data-constraints="@Required" />
										<span class="empty-message">*Este dato es requerido.</span>
								</label>
								<label class="email">
									<span class="text">E-mail:</span>
									<input type="text" name="mail" placeholder="" value="" data-constraints="@Required @Email" />
									<span class="empty-message">*Este dato es requerido.</span>
									<span class="error-message">*Ingrese un mail valido.</span>
								</label>
								<label class="subject">
									<span class="text">Asunto:</span>
									<input type="text" name="asunto" placeholder="" value="" data-constraints="@Required" />
									<span class="empty-message">*Este dato es requerido.</span>
								</label>
								<label class="message">
									<span class="text">Mensaje:</span>
									<textarea name="mensaje" placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
									<span class="empty-message">*Este dato es requerido.</span>
									<span class="error-message">*The message is too short.</span>
								</label>
								<div class="cont_btn">
									<a href="#" data-type="reset" class="btn">Reset</a>
									<?php 
						        		echo form_submit(array(
						        			'value'=>'Enviar',
						        			'class'=>'btn'
						        		)); 
						        	?>
								</div>
						</fieldset> 
					</form>
				</div>
				<div class="grid_6 preffix_1">
					<div>
						<hader>
							<h2><span>Acortar distancias</span></h2>
						</hader>
						<p class="el-1">
							Este es el primer paso para encontrarle una solucion a su medida. En la actualidad los tiempos de comunicacion son inmediatos por eso cuanto antes se quite las dudas que posea mas pronto recibira la solucion que necesita. Sea descriptivo y detallista con su requerimiento para una mejor respuesta.
						</p>
						<p class="el-2">
							En caso de tener proyectos en mente que tengan similitudes con alguno existente en la web no dude en agregarlos al mensaje. Ya sea de funcionalidad o estetica cuanto mayor informacion podamos recopilar antes encontraremos la respuesta que necesita. Optimizando el tiempo y siendo eficacez al mismo tiempo.
						</p>
					</div>
					<div class="grid_3 alpha">
						<div class="address">
							<p>En la brevedad nos estaremos contactando para construir juntos su idea.</p>
						</div>
					</div>
					<div class="grid_3">
						<div class="address">
							<p>Skype: smartinmedina  <br>E-mail: <a href="mailto:contacto@smartinweb.com" class="mail">contacto@smartinweb.com</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>