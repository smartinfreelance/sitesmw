
<!--=======footer=================================-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="grid_12 copyright">
				<h2><span>Redes Sociales</span></h2>
				<a href="#" class="btn bd-ra"><span class="fa fa-twitter"></span></a>
				<!--<a href="#" class="btn bd-ra"><span class="fa fa-facebook"></span></a>-->
				<!--<a href="#" class="btn bd-ra"><span class="fa fa-youtube"></span></a>-->
				<a href="https://ar.linkedin.com/pub/sergio-martin-medina/22/b94/119" class="btn bd-ra"><span class="fa fa-linkedin"></span></a>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div id = "copyrightPart" name = "copyrightPart">
			SmartinWeb 2010 - 2016
		</div>
	</div>
</footer>
<?php
	if(($modulo=="home")||($modulo=="webblog")){
?>
<script>
	jQuery(function(){
		jQuery('#camera_wrap').camera({
			height: '34.58333333333333%',
			thumbnails: false,
			pagination: true,
			fx: 'simpleFade',
			loader: 'none',
			hover: false,
			navigation: false,
			playPause: false,
			minHeight: "139px",
		});
	});
</script>
<?php
		if($modulo=="home"){
?>
<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			navigation: true,
			pagination: false,
			items : 3,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3],
			itemsTablet: [750,1],
			itemsMobile : [479,1],
			navigationText: false
		});
	});
</script>
<?php
		}
	}
?>

<?php
	if($modulo=="productos"){
?>
<script>
	$(function(){
		$('#touch_gallery a').touchTouch();
	});
</script>
	<?php
		}
	?>

<script>
	$(document).ready(function() { 
			if ($('html').hasClass('desktop')) {
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 20,
					resposive: true,
					hideDistantElements: true,
				});
			}
		});
</script>
<?php
	if($modulo=="contacto"){
?>
<script type="text/javascript">
	google_api_map_init();
	function google_api_map_init(){
		var map;
		var coordData = new google.maps.LatLng(parseFloat(40.650408), parseFloat(-73.950030,12));
		var markCoord1 = new google.maps.LatLng(parseFloat(40.650408), parseFloat(-73.950030));
		var marker;
		
		function initialize() {
			var mapOptions = {
				zoom: 14,
				center: coordData,
				scrollwheel: false,
			}

			var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			
			marker = new google.maps.Marker({
				map:map,
				position: markCoord1,
			});

			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(coordData);
				var center = map.getCenter();
			});
		}

		google.maps.event.addDomListener(window, "load", initialize); 

	}

</script>
<?php
	}
?>
<script type="text/javascript">
	$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});
</script>
</body>
</html>