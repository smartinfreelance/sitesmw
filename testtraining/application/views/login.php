<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
		echo "<title>Login</title>";
	?>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />

	<script src="<?php echo base_url();?>js/jquery.js"></script>

	<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/jquery-ui-1.8.16.custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/jquery.jqplot.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/prettify.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/elfinder.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/elfinder.theme.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/fullcalendar.css" rel="stylesheet">
	<link href="<?php echo base_url();?>js/plupupload/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/icons-sprite.css" rel="stylesheet">
	<link id="themes" href="<?php echo base_url();?>css/themes.css" rel="stylesheet">
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
							echo anchor('preguntas/index', '<h4>SMartin - AEM Certification</h4>');
						?>
					</div>
				</div>
				<ul class="nav pull-right">

				</ul>
			</div>
		</div>
	</div>
<?php echo form_open('login/login/intenta_loggear'); ?>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Username or Email" name="usuario" class="login-input user-name">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="password" placeholder="Password" name="pass" class="login-input user-pass">
				</div>
			</div>
		</div>
		<div class="clearfix">
            <?php 
        		echo form_submit(array(
        			'id'=>'cmdSiguiente', 
        			'value'=>'Conectarse',
        			'class'=>'btn btn-inverse login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>js/prettify.js"></script>
<script src="<?php echo base_url();?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url();?>js/accordion.jquery.js"></script>
<script src="<?php echo base_url();?>js/smart-wizard.jquery.js"></script>
<script src="<?php echo base_url();?>js/vaidation.jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery-dynamic-form.js"></script>
<script src="<?php echo base_url();?>js/fullcalendar.js"></script>
<script src="<?php echo base_url();?>js/raty.jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.noty.js"></script>
<script src="<?php echo base_url();?>js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url();?>js/data-table.jquery.js"></script>
<script src="<?php echo base_url();?>js/TableTools.min.js"></script>
<script src="<?php echo base_url();?>js/ColVis.min.js"></script>
<script src="<?php echo base_url();?>js/plupload.full.js"></script>
<script src="<?php echo base_url();?>js/elfinder/elfinder.min.js"></script>
<script src="<?php echo base_url();?>js/chosen.jquery.js"></script>
<script src="<?php echo base_url();?>js/uniform.jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.tagsinput.js"></script>
<script src="<?php echo base_url();?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url();?>js/check-all.jquery.js"></script>
<script src="<?php echo base_url();?>js/inputmask.jquery.js"></script>
<script src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script src="<?php echo base_url();?>js/plupupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="<?php echo base_url();?>js/excanvas.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.jqplot.min.js"></script>
<script src="<?php echo base_url();?>js/chart/jqplot.highlighter.min.js"></script>
<script src="<?php echo base_url();?>js/chart/jqplot.cursor.min.js"></script>
<script src="<?php echo base_url();?>js/chart/jqplot.dateAxisRenderer.min.js"></script>
<script src="<?php echo base_url();?>js/custom-script.js"></script>
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>js/ios-orientationchange-fix.js"></script>
</body>
</html>