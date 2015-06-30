<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
		echo "<title>".ucfirst($modulo)."</title>";
	?>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<?php
		if($modulo=="home"){
	?>
	<link rel="stylesheet" href="css/camera.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<?php
		}
	?>
	<?php
		if($modulo=="productos"){
	?>
	<link rel="stylesheet" href="css/touchTouch.css">
		<?php
		}
	?>
	<?php
		if(($modulo=="contacto")||($modulo=="login")){
	?>
	<link rel="stylesheet" href="css/contact-form.css">
	<?php
		}
	?>

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<?php
		if($modulo=="productos"){
	?>
	<script src="js/touchTouch.jquery.js"></script>
		<?php
		}
	?>
	<?php
		if($modulo=="home"){
	?>
	<script src='js/camera.js'></script>
	<script src="js/owl.carousel.js"></script>
	<?php
		}
	?>
	<script src="js/jquery.stellar.js"></script>
	<script src="js/script.js"></script>
	<?php
		if(($modulo=="contacto")||($modulo=="login")){
	?>
	<script src='//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false'></script>
	<?php
		}
	?>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<?php
		if($modulo=="home"){
	?>
	<script src="js/jquery.mobile.customized.min.js"></script>
	<?php
		}
	?>
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
					<h1><a href = "index.php">SMartin</a>
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