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
						<h2><span>Productos</span></h2>
					</header>
				</div>
				<div id="touch_gallery">
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-1-big.jpg"><img src="images/index-2_img-1.jpg" alt="projects"></a></div>
						<article>
							<h4>Control de Stock</h4>
							<p>Proyecto creado para pequeñas y medianas empresas con gran caudal de movimiento de productos en tiempo contante. Controlar la cantidad de articulos a venderse es vital para mantener el flujo de ventas es por esto que AlertStock es la solucion para ellas. Con la creacion del listado de los productos a controlar y la configuracion de los indices guia podrá controlar mediante cualquier dispositivo con control a internet el estado del Stock de su emprendimiento.</p>
						</article>
					</div>
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-2-big.jpg"><img src="images/index-2_img-2.jpg" alt="projects"></a></div>
						<article>
							<h4>Facturacion</h4>
							<p>Sistema desarrollado para poder centralizar la informacion de ventas en varios puntos de venta. Tener accesos contante al estado de las ventas dia a dia en el momento que crea necesario, con el simple hecho de acceder a Facturacion SMart para controlar el estado de los ingresos, planificacion de ventas a futuro. Y recaudacion por puntos de venta. Herramienta completa para su emprendimiento, necesario para estar al tanto todo el tiempo del estado de su negocio.</p>
						</article>
					</div>
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-3-big.jpg"><img src="images/index-2_img-3.jpg" alt="projects"></a></div>
						<article>
							<h4>Proyeccion de Gastos</h4>
							<p>Realizada para todo emprendimiento con constante inversion. Preveer los gastos para optimizar las ganancias y asi hacer de su negocio una mejor fuente de ingresos. Con el sistema de Proyeccion de gastos deberá configurar los datos que le ocasionan variaciones negativas e inversiones constantes para asi preveer con solo algunos clicks cuales son los proximos egresos en su empresa. Teniendo la ventaja de generar un reporte de futuros gastos basados en la experiencia.</p>
						</article>
					</div>
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-4-big.jpg"><img src="images/index-2_img-4.jpg" alt="projects"></a></div>
						<article>
							<h4>Produccion</h4>
							<p>Ideado para empresas manufactureras. Este sistema de produccion le permitira maquetar cada producto a fabricar y asi calcular el costo de produccion de cada producto. De esta forma podrá administrar costos de grandes pedidos, calcular las proximas producciones y los ingresos de las mismas. De esta forma visibilizar el poder de recaudacion de cada producto y asi ajustarlo para su beneficio. Ideal para potenciar las ventas de sus productos con mayor margen de ganancia.</p>
						</article>
					</div>
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-5-big.jpg"><img src="images/index-2_img-5.jpg" alt="projects"></a></div>
						<article>
							<h4>Inmobiliario</h4>
							<p>Desarrollado para empresas inmobiliarias que quieran potenciar su alcance. Con el objetivo de complementar su presentacion online se diseña en conjunto con una pagina web la misma que contendra su vision como empresa e informará a sus visitantes acerca de la empresa. Administre sus propiedades a alquilar o vender con imagenes, mapas y detalles para que quienes visiten su web no duden en confiar en sus servicios. Ideal para fortalecer su emprendimiento inmobiliario.</p>
						</article>
					</div>
					<div class="grid_4">
						<div class="img_container"><a href="images/index-2_img-8-big.jpg"><img src="images/index-2_img-8.jpg" alt="projects"></a></div>
						<article>
							<h4>Reservas</h4>
							<p>Sistema de reserva para toda clases de emprendimientos que requieran el uso de un tiempo en un espacio determinado y/o de especialistas destinados a una tarea en particular. Turnos medicos, Sesiones, Hoteles, Estacionamientos, Salas de Reuniones, Canchas de Futbol, etc. Este sistema le permitira contar con la planilla de disponibilidad de su horarios de forma online, con lo que solo bastará con revisar su web. Esto falicitará la informacion a sus posibles clientes.</p>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
  include('bottom.php'); 
?>