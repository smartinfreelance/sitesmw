<?php
  $modulo = "";
  $path = __FILE__;
  $file = basename($path, ".php");
  if($file == "index"){
    $modulo = "home";
  }else if($file == "contacto"){
    $modulo = "contacto";
  }else if($file == "productos"){
    $modulo = "productos";
  }else if($file == "servicios"){
    $modulo = "servicios";
  }
  include('top.php'); 
?>
<style type="text/css">
	.antispam { display:none;}
</style>

<script type="text/javascript">
	// split your email into two parts and remove the @ symbol
	var first = "smartinmedina";
	var last = "hotmail.com";
</script>
<section id="content">
	<div class="full-width-container block-2">
		<div class="container">
			<div class="row">
				<div class="grid_5">
					<form id="contact-form" action = "submit.php" method ="post">
						<div class="contact-form-loader"></div>
							<header>
								<h2>
									<span>
										Contacto
									</span>
								</h2>
							</header>
							<fieldset>
							<?php //echo form_open('start/sendConsulta'); ?>
								<label class="name">
									<span class="text">
										Nombre:
									</span>
									<input type="text" name="nombre" placeholder="" value="" data-constraints="@Required" />
										<span class="empty-message">*Este dato es requerido.</span>
								</label>
								<label class="email">
									<span class="text">
										E-mail:
									</span>
									<input type="text" name="mail" placeholder="" value="" data-constraints="@Required @Email" />
									<span class="empty-message">
										*Este dato es requerido.
									</span>
									<span class="error-message">
										*Ingrese un mail valido.
									</span>
								</label>
								<label class="subject">
									<span class="text">
										Asunto:
									</span>
									<input type="text" name="asunto" placeholder="" value="" data-constraints="@Required" />
									<span class="empty-message">
										*Este dato es requerido.
									</span>
								</label>
								<label class="message">
									<span class="text">
										Mensaje:
									</span>
									<textarea name="mensaje" placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
									<span class="empty-message">
										*Este dato es requerido.
									</span>
									<span class="error-message">
										*The message is too short.
									</span>
								</label>
								<p class="antispam">
									Leave this empty:
									<br />
									<input name="url" />
								</p>
								<div class="cont_btn">
									<a href="#" data-type="reset" class="btn">
										Reset
									</a>
									<input type = "submit" class = "btn" value = "Enviar" />
								</div>
						</fieldset> 
					</form>
				</div>
				<div class="grid_6 preffix_1">
					<div>
						<hader>
							<h2>
								<span>
									Acortar distancias
								</span>
							</h2>
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
							<p>
								En la brevedad nos estaremos contactando para construir juntos su idea.
							</p>
						</div>
					</div>
					<div class="grid_3">
						<div class="address">
							<p>
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
  include('bottom.php'); 
?>