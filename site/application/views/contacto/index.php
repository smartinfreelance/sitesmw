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
									<label class="name">
										<span class="text">Nombre:</span>
										<input type="text" name="name" placeholder="" value="" data-constraints="@Required" />
											<span class="empty-message">*Este dato es requerido.</span>
									</label>
									<label class="email">
										<span class="text">E-mail:</span>
										<input type="text" name="email" placeholder="" value="" data-constraints="@Required @Email" />
										<span class="empty-message">*Este dato es requerido.</span>
										<span class="error-message">*Ingrese un mail valido.</span>
									</label>
									<label class="subject">
										<span class="text">Asunto:</span>
										<input type="text" name="phone" placeholder="" value="" data-constraints="@Required" />
										<span class="empty-message">*Este dato es requerido.</span>
									</label>
									<label class="message">
										<span class="text">Mensaje:</span>
										<textarea name="message" placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
										<span class="empty-message">*Este dato es requerido.</span>
										<span class="error-message">*The message is too short.</span>
									</label>
								<div class="cont_btn">
									<a href="#" data-type="reset" class="btn">Reset</a>
									<a href="#" data-type="submit" class="btn">Enviar</a>
								</div>
						</fieldset> 
						<div class="modal fade response-message">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Modal title</h4>
									</div>
									<div class="modal-body">
										You message has been sent! We will be in touch soon.
									</div>
								</div>
							</div>
						</div>
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