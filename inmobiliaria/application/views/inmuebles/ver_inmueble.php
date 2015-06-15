<style type="text/css">
  #map-canvas { height: auto;width:100%; }
</style>
<script type="text/javascript">
  function initialize() {
  	var centerLatLng =  new google.maps.LatLng(<?php echo $inmueble->pos_lat; ?>, <?php echo $inmueble->pos_lng; ?>);
    var mapOptions = {
      center: centerLatLng,
      zoom: 16
    };
    
    var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    var marker = new google.maps.Marker({
      position: centerLatLng,
      map: map,
      title: '<?php echo $inmueble->direccion; ?>'
  	});
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>


<div id = "main-content">
	<div class = "container">
		<table>
			<tr>
				<td>

				<?php
					$x = 0;
					foreach ($fotos as $f) {
						$x++;
				?>
					<div class="image" id = "image<?php echo $x; ?>" style="<?php if($x==1){ echo 'display:block;';}else{ echo 'display:none;';}?>width:600px;height:400px;" >
						<img src = "<?php echo base_url().$f->path;?>" width="auto" height="auto">
					</div>

					<div class="image">
					<?php
							# code...
						}
						$x = 0;
						foreach ($fotos as $f) {
							$x++;
					?>
					<div id = "imthumb<?php echo $x; ?>" style = "align:left;cursor:pointer;">
						<img src = "<?php echo base_url().$f->path_thumb;?>">
					</div>
					<?php
						# code...
					}
				?>
					</div>
					
				</td>
				<td valign="top">
					<div id="map-canvas"></div>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#imthumb1").on("click", function() {
   			$("#image1").css('display','block');
   			$("#image2").css('display','none');
   			$("#image3").css('display','none');
   			$("#image4").css('display','none');
   			$("#image5").css('display','none');
   			$("#image6").css('display','none');
   		});
   		$("#imthumb2").on("click", function() {
   			$("#image1").css('display','none');
   			$("#image2").css('display','block');
   			$("#image3").css('display','none');
   			$("#image4").css('display','none');
   			$("#image5").css('display','none');
   			$("#image6").css('display','none');
   		});
   		$("#imthumb3").on("click", function() {
   			$("#image1").css('display','none');
   			$("#image2").css('display','none');
   			$("#image3").css('display','block');
   			$("#image4").css('display','none');
   			$("#image5").css('display','none');
   			$("#image6").css('display','none');
   		});
   		$("#imthumb4").on("click", function() {
   			$("#image1").css('display','none');
   			$("#image2").css('display','none');
   			$("#image3").css('display','none');
   			$("#image4").css('display','block');
   			$("#image5").css('display','none');
   			$("#image6").css('display','none');
   		});
   		$("#imthumb5").on("click", function() {
   			$("#image1").css('display','none');
   			$("#image2").css('display','none');
   			$("#image3").css('display','none');
   			$("#image4").css('display','none');
   			$("#image5").css('display','block');
   			$("#image6").css('display','none');
   		});
   		$("#imthumb6").on("click", function() {
   			$("#image1").css('display','none');
   			$("#image2").css('display','none');
   			$("#image3").css('display','none');
   			$("#image4").css('display','none');
   			$("#image5").css('display','none');
   			$("#image6").css('display','block');
   		});
	});
</script>