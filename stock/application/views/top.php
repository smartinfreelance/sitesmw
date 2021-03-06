<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
		echo "<title>".ucfirst($modulo)."</title>";
	?>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />

	<script src="<?php echo base_url();?>../js/jquery.js"></script>

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
							echo anchor('productos', '<h4>SMartin - Stock</h4>', array("class" => "divisor"));
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
								echo anchor('productos', '<i class="color-icons brick_co"></i> Productos', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('categorias', '<i class="color-icons books_co"></i> Categorias', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('reportes', '<i class="color-icons chart_bar_co"></i> Reportes', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="dashboard-wid-wrap">
						<div class="dashboard-wid-content"> 
							<?php 
								echo anchor('movimientos', '<i class="color-icons arrow_refresh_co"></i> Movimientos', array('style="strong"','class="btn btn-large"')); 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>