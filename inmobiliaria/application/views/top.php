<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
		echo "<title>".ucfirst($modulo)."</title>";
	?>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />

	<script src="<?php echo base_url();?>../js/jquery.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApeaXAQxAHETbF2cf4SmR_VRWZwfDFAL4"></script>

	<link href="<?php echo base_url();?>../css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/jquery-ui-1.8.16.custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/jquery.jqplot.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/prettify.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/elfinder.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/elfinder.theme.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/fullcalendar.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../js/plupupload/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url();?>../css/icons-sprite.css" rel="stylesheet">
	<link id="themes" href="<?php echo base_url();?>../css/themes.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/css/slick.css" rel="stylesheet">
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
	<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<div class="branding">
					<div class="logo">
						<a href="index.html"></a>
						<?php
							echo anchor('inmuebles', '<h4>SMartin - Inmobiliaria</h4>', array("class" => "divisor"));
						?>
					</div>
				</div>
				<ul class="nav pull-right">
					<li>
						<?php
							echo anchor('login/login/intenta_desloggear', '<i class="icon-share-alt icon-white"></i> Logout');
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id = "main-content">
		<div class = "container">
			<div class="dashboard-widget">
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('contactos', '<i class="color-icons brick_co"></i> Contactos', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('inmuebles', '<i class="color-icons books_co"></i> Inmuebles', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('operaciones', '<i class="color-icons chart_bar_co"></i> Operaciones', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('roles', '<i class="color-icons arrow_refresh_co"></i> Roles', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-widget">
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('tcontactos', '<i class="color-icons brick_co"></i> Tipos de Contactos', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('tinmuebles', '<i class="color-icons brick_co"></i> Tipos de Inmuebles', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('usuarios', '<i class="color-icons brick_co"></i> Usuarios', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('einmuebles', '<i class="color-icons brick_co"></i> Estados', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>				
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('ambientes', '<i class="color-icons brick_co"></i> Ambientes', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('servicios', '<i class="color-icons brick_co"></i> Servicios', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-widget">
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('instalaciones', '<i class="color-icons brick_co"></i> Instalaciones', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('fotos', '<i class="color-icons brick_co"></i> Fotos', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('busqueda', '<i class="color-icons brick_co"></i> Busqueda', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('grilla', '<i class="color-icons brick_co"></i> Grilla de Inmuebles', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>