<section id="content">
	<div class="full-width-container block-1">
		<div class="camera_container">
			<div id="camera_wrap">
				<div class="item" data-src=<?php echo base_url()."images/carousel-1.jpg";?>>
					<div class="camera_caption fadeIn">
						<h3>Bienvenido.</h3>
						<p>Diseño y desarrollo herramientas web. Conoceme.</p>
						<a href="#conoceme" class="btn bd-ra"><span class="fa fa-smile-o"></span></a>
					</div>
				</div>
				<div class="item" data-src=<?php echo base_url()."images/carousel-2.jpg";?>>
					<div class="camera_caption fadeIn">
						<h3>La pieza que necesitas</h3>
						<p>Genero herramientas para conseguir soluciones</p>
						<a href="#productos" class="btn bd-ra"><span class="fa fa-puzzle-piece"></span></a>
					</div>
				</div>
				<div class="item" data-src=<?php echo base_url()."images/carousel-3.jpg";?>>
					<div class="camera_caption fadeIn">
						<h3>Diseños a tu Medida</h3>
						<p>Atencion personalizada</p>
						<a href="#amedida" class="btn bd-ra"><span class="fa fa-code"></span></a>
					</div>
				</div>
				<div class="item" data-src=<?php echo base_url()."images/carousel-4.jpg";?>>
					<div class="camera_caption fadeIn">
						<h3>No te quedes con dudas</h3>
						<p>Enviame tu consulta.</p>
						<?php echo anchor('start/verContacto', '<span class="fa fa-at"></span>', 'class="btn bd-ra"'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="conoceme">	
		<div class="full-width-container block-2">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<header>
							<h2><span>Me presento</span></h2>
						</header>
					</div>
					<div class="grid_4">
						<div class="img_container"><img src="<?php echo base_url(); ?>images/index-1_img-1.jpg" alt="img"></div>
					</div>
					<div class="grid_7 preffix_1">
						<p>Bienvenido, gracias por pasar por mi web. Mi nombre es Sergio Martín Medina, desarrollo sistemas de sistemas hace mas de 6 años. Siempre me desempeñé laboralmente en el ambito informatico y de sistemas. Desarrolle sistemas relacionados con  diferentes rubros: Servicios, Marketing, Publicidad y Finanzas, entre otros. Recorriendo diversos lenguajes de programacion y por proyectos de multiples tamaños, desde PyMES hasta multinacionales.</p>
						<p>Algunas de las tecnologias que domino son: JAVA, Javascript, PHP, MySQL, CSS Y HTML5. </p>
						<p>Al trabajar de forma independiente me interiorizo con las necesidades de mis clientes por lo que es prioridad su satisfaccion. </p>
						<?php echo anchor("start/verContacto", "contactame", array("class"=>"btn")); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="productos">
		<div class="full-width-container block-3 parallax-block" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<header>
							<h2><span>Productos</span></h2>
						</header>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Stock</a></h3></div>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Facturacion</a></h3></div>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Administracion</a></h3></div>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Inmobiliario</a></h3></div>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Diseño Web</a></h3></div>
					</div>
					<div class="grid_4">
						<div class="element"><h3><a href="#">Desarrollo a Medida</a></h3></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="amedida">
		<div class="full-width-container block-4">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<header>
							<h2><span>Algunos trabajos</span></h2>
						</header>
					</div>
				</div>
				<div class="row">
					<div id="owl-carousel" class="owl-carousel">
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-1.jpg";?> alt="img"></div>
								<div class="owl-text">Alerta Stock</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-2.jpg";?> alt="img"></div>
								<div class="owl-text">Facturacion</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-3.jpg";?> alt="img"></div>
								<div class="owl-text">Administración</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-4.jpg";?> alt=""></div>
								<div class="owl-text">Diseño Web</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-5.jpg";?> alt=""></div>
								<div class="owl-text">Reportes Graficos</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="">
								<div class="img_container"><img src=<?php echo base_url()."images/index_img-6.jpg";?> alt=""></div>
								<div class="owl-text">A medida</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="full-width-container block-5">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<header>
						<h2><span>Novedades</span></h2>
					</header>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">November 2014</a></h3>
						<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">March 2015</a></h3>
						<p>Damus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibust.</p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
				<div class="grid_4">
					<article>
						<h3><a href="#">June 2015</a></h3>
						<p>Jamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuadaonec. </p>
						<a href="#" class="btn">More</a>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>