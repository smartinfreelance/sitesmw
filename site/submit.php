<?php

// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == ''){

	$to = "smartinmedina@hotmail.com";
	$subject = "Different Try";
	$txt = "Hello world!";
	$headers = "From: ".$_POST['mail']. "\r\n" ."CC: somebodyelse@example.com";

	mail("smartinmedina@hotmail.com", 
		$_POST['asunto'], 
		"Contacto desde la pagina web. \r\n" ."Mail: ".$_POST['mail']. "\r\n \r\n" .$_POST['mensaje'], 
		"From: ".$_POST['mail']);

	// mail($to,$subject,$txt,$headers);
	//mail( 'smartinmedina@gmail.com', 'Contact Form', print_r($_POST,true) );
	//mail( 'smartinmedina@hotmail.com', 'Contact Form 2', print_r($_POST,true) );
}

// otherwise, let the spammer think that they got their message through

?>
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
  }else if($file == "submit"){
    $modulo = "gracias ".$_POST['nombre'];
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
					<form id="contact-form">
						<div class="contact-form-loader"></div>
							<header>
								<h2><span>Contacto</span></h2>
							</header>
							<fieldset>
								<h3>Tu mensaje fue recibido exitosamente, a la brevedad nos estaremos comunicando para responder su consulta.</h3>
								<h3>Gracias</h3>
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
<?php
  include('bottom.php'); 
?>