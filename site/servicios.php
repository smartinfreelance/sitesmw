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
<section id="content">
	<div class="full-width-container block-1">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2>
							<span>
								Servicios
							</span>
						</h2>
					</header>
				</div>
			</div>
			<div class="row">
				<div class="grid_8">
					<article class="clearfix">
						<div class="grid_4 alpha">
							<div class="img_container">
								<img src="images/index-3_img-1.jpg" alt="img">
							</div>
						</div>
						<div class="grid_4">
							<h5>
								<a href="#">
									Desarrollo Web a Medida
								</a>
							</h5>
							<p>
								Soluciones personalizadas a sus necesidades web, trabajando en conjunto y con objetivos relacionados a tiempos de entrega que podrá ir comprobando diariamente. 
								<br /> 
								<br />
								La mejor opcion para hacer crecer su idea de optimizacion, mejora o innovacion a los hechos para fortalecerse como emprendimiento y de esta forma crecer. Nos interiorizamos directamente con las necesidades por lo que el desarrollo de los proyectos tienen solo como objetivo la mejora y el alcance de los objetivos establecidos desde un principio. 
							</p>
						</div>
					</article>
					<article class="clearfix">
						<div class="grid_4 alpha">
							<div class="img_container">
								<img src="images/index-3_img-2.jpg" alt="img">
							</div>
						</div>
						<div class="grid_4">
							<h5>
								<a href="#">
									Diseño Web
								</a>
							</h5>
							<p>
								Lleve su emprendimiento a la web porque hoy por hoy toda empresa que se precie de tal tiene su espacion online para mostrarse ante el mundo. Sin importar su tamaño o alcance, si es nacional o internacional. Su pagina web hablará por usted ante el mundo. Un sitio autoaministrable tambien puede ser la opcion. En conjunto podemos idear la mejor opcion para que su compania tenga la mejor vision en la web. Pongase en <a href="contacto.php" >contacto</a> de inmediato. 
							</p>
						</div>
					</article>
					<article class="clearfix">
						<div class="grid_4 alpha">
							<div class="img_container">
								<img src="images/index-3_img-3.jpg" alt="img">
							</div>
						</div>
						<div class="grid_4">
							<h5>
								<a href="#">
									Hosting
								</a>
							</h5>
							<p>
								Servicio de hosting se ofrece de la mano de los del de Desarrollo a medida y el de Diseño Web. Pero tambien puede ser ofrecido de forma individual en la medida de sus necesidades. No dude en ponerse en <a href="contacto.php" >contacto</a> y consulte la lista de precios actualizada.
							</p>
						</div>
					</article>
				</div>
				<div class="grid_4">
					<h5 class="h5__mod">
						<a href="#">
							Dev &amp; Design Tools
						</a>
					</h5>
					<ul>
						<li>
							<a href="#">
								PHP
							</a>
						</li>
						<li>
							<a href="#">
								JavaScript
							</a>
						</li>
						<li>
							<a href="#">
								MySQL
							</a>
						</li>
						<li>
							<a href="#">
								jQuery
							</a>
						</li>
						<li>
							<a href="#">
								JAVA
							</a>
						</li>
						<li>
							<a href="#">
								JSP
							</a>
						</li>
						<li>
							<a href="#">
								AJAX
							</a>
						</li>
						<li>
							<a href="#">
								HTML
							</a>
						</li>
						<li>
							<a href="#">
								CSS
							</a>
						</li>						
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
  include('bottom.php'); 
?>