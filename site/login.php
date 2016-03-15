<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    //echo "<title>".ucfirst($modulo)."</title>";
    $modulo="login";
    echo "<title>Login</title>";
  ?>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/camera.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/touchTouch.css">
  <link rel="stylesheet" href="css/contact-form.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script>
  <script src="js/touchTouch.jquery.js"></script>
  <script src='js/camera.js'></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/jquery.stellar.js"></script>
  <script src="js/script.js"></script>
  <script src='//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false'></script>
  <script src="js/jquery.mobile.customized.min.js"></script>
  <script src="js/wow.js"></script>
  <script>
    $(document).ready(function () {
      if ($('html').hasClass('desktop')) {
        new WOW().init();
      }
    });
  </script>
  <!--<![endif]-->
  <!--[if lt IE 8]>
  <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
  </div>
  <![endif]-->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
  <![endif]-->
  </head>

  <?php
    if($modulo == "home"){
      $bodyClass = "index";
    }else if($modulo == "productos"){
      $bodyClass = "index-2";
    }else if($modulo == "servicios"){
      $bodyClass = "index-3";
    }else if($modulo == "webblog"){
      $bodyClass = "index-1";
    }else if($modulo == "contacto"){
      $bodyClass = "index-4";
    }else{
      $bodyClass = "index";
    }
  ?>
<body class=<?php echo $bodyClass; ?>>
<!--==============================header=================================-->
<header id="header">

  <div id="stuck_container">
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h1><a href = "index.php">SmartinWeb</a>
          <span>diseño y desarrollo web</span></h1>
          <?php 
            if($modulo != 'login'){
          ?>
          <nav>
            <ul class="sf-menu">
              <li<?php if($modulo=="home"){?> class="current" <?php } ?>><a href = "index.php">Home</a></li>
              <li<?php if($modulo=="productos"){ ?> class="current" <?php }?>><a href = "productos.php">Productos</a></li>
              <li<?php if($modulo=="servicios"){ ?> class="current" <?php } ?>><a href = "servicios.php">Servicios</a></li>
              <li<?php if($modulo=="contacto"){ ?> class="current" <?php } ?>><a href = "contacto.php">Contacto</a></li>
            </ul>
          </nav>
          <?php 
            }
          ?>  
        </div>
      </div>
    </div>
  </div>
</header>

<!--=======content================================-->
<section id="content">

  <div id="conoceme"> 
    <div class="full-width-container block-2">
      <div class ="row">
        <div class ="col12" align="center">
          <table border = "">
            <tr>
              <td>
                a
              </td>
              <td>
                a
              </td>
            </tr>
            <tr>
              <td>
                b
              </td>
              <td>
                b
              </td>
            </tr>
          </table>
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

<!--=======footer=================================-->
<footer id="footer">
  <div class="container">

  </div>
  <div class="footer_bottom">
    <div id = "copyrightPart" name = "copyrightPart">
      SmartinWeb 2010 - 2016
    </div>
  </div>
</footer>

</body>
</html>