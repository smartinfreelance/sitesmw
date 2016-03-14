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
    <div class="camera_container">
      <div id="camera_wrap">
        <div class="item" data-src="images/carousel-1.jpg">
          <div class="camera_caption fadeIn">
            <h3>
              Bienvenido
            </h3>
            <p>
              Diseño y desarrollo web
            </p>
            <a href="#conoceme" class="btn bd-ra">
              <span class="fa fa-smile-o"></span>
            </a>
          </div>
        </div>
        <div class="item" data-src="images/carousel-2.jpg">
          <div class="camera_caption fadeIn">
            <h3>
              La pieza que necesitas
            </h3>
            <p>
              Generamos herramientas para conseguir soluciones
            </p>
            <a href="#productos" class="btn bd-ra">
              <span class="fa fa-puzzle-piece"></span>
            </a>
          </div>
        </div>
        <div class="item" data-src="images/carousel-3.jpg">
          <div class="camera_caption fadeIn">
            <h3>
              Diseños a tu Medida
            </h3>
            <p>
              Atencion personalizada
            </p>
            <a href="#amedida" class="btn bd-ra">
              <span class="fa fa-code"></span>
            </a>
          </div>
        </div>
        <div class="item" data-src="images/carousel-4.jpg">
          <div class="camera_caption fadeIn">
            <h3>
              No te quedes con dudas
            </h3>
            <p>
              Envianos tu consulta
            </p>
            <a href = "contacto.php" class="btn bd-ra">
              <span class="fa fa-at"></span>
            </a>
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
              <h2>
                <span>
                  Bienvenido
                </span>
              </h2>
            </header>
          </div>
          <div class="grid_4">
            <div class="img_container">
              <img src="images/index-1_img-1.jpg" alt="img">
            </div>
          </div>
          <div class="grid_7 preffix_1">
            <p>
              SmartinWeb es un equipo conformado por de jovenes profesionales con pasion por el desarrollo y el diseño web. Estamos comprometidos con la satisfaccion de nuestros clientes porque consideramos que su exito en la Web es nuestro motor para continuar creciendo.
            </p>
            <p>
              Nos encargamos por completo de las necesidades de tu emprendimiento o negocio, desde la concepcion de la idea hasta mantenerla activa online y funcionando en optimas condiciones.
              Somos un equipo conformado por Analistas, Desarrolladores, Diseñadores y Administradores de bases de datos para cubrir con todas las necesidades de todos nuestros proyectos.
            </p>
            <a href = "contacto.php" class="btn">
              Contacto
            </a>
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
              <h2>
                <span>
                  Productos
                </span>
              </h2>
            </header>
          </div>
          <div class="grid_4">
            <div class="element">
              <h3>
                <!-- <a href="#">-->
                  Stock
                <!-- </a>-->
              </h3>
            </div>
          </div>
          <div class="grid_4">
            <div class="element">
              <h3>
                <!-- <a href="#"> -->
                  Facturacion
                <!-- </a> -->
              </h3>
            </div>
          </div>
          <div class="grid_4">
            <div class="element">
              <h3>
                <!-- <a href="#">-->
                  Administracion
                <!-- </a>-->
              </h3>
            </div>
          </div>
          <div class="grid_4">
            <div class="element">
              <h3>
                <!-- <a href="#">-->
                  Inmobiliario
                <!-- </a>-->
              </h3>
            </div>
          </div>
          <div class="grid_4">
            <div class="element">
              <h3>
                <!-- <a href="#">-->
                  Diseño Web
                <!-- </a>-->
              </h3>
            </div>
          </div>
            <div class="grid_4">
              <div class="element">
                <h3>
                  <!-- <a href="#">-->
                    Desarrollo a Medida
                  <!-- </a>-->
                </h3>
              </div>
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
              <h2>
                <span>
                  Portfolio
                </span>
              </h2>
            </header>
          </div>
        </div>
        <div class="row">
          <div id="owl-carousel" class="owl-carousel">
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-1.jpg" alt="img">
                </div>
                <div class="owl-text">
                  Alerta Stock
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-2.jpg" alt="img">
                </div>
                <div class="owl-text">
                  Facturacion
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-3.jpg" alt="img">
                </div>
                <div class="owl-text">
                  Administración
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-4.jpg" alt="">
                </div>
                <div class="owl-text">
                  Diseño Web
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-5.jpg" alt="">
                </div>
                <div class="owl-text">
                  Reportes Graficos
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div class="">
                <div class="img_container">
                  <img src="images/index_img-6.jpg" alt="">
                </div>
                <div class="owl-text">
                  A medida
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  <div class="full-width-container block-5">
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
  <a href="#" class="btn">LEER MAS</a>
  </article>
  </div>
  <div class="grid_4">
  <article>
  <h3><a href="#">March 2015</a></h3>
  <p>Damus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibust.</p>
  <a href="#" class="btn">LEER MAS</a>
  </article>
  </div>
  <div class="grid_4">
  <article>
  <h3><a href="#">June 2015</a></h3>
  <p>Jamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuadaonec. </p>
  <a href="#" class="btn">LEER MAS</a>
  </article>
  </div>
  </div>
  </div>
  </div>-->
</section>
<?php include('bottom.php'); ?>