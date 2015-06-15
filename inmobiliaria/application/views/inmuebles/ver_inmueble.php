<style type="text/css">
  #map-canvas { height: 300px;width:300px; }
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
		<table width="100%">
			<tr>
				<td width="50%" align="center">

				<?php
					$x = 0;
					foreach ($fotos as $f) {
						$x++;
				?>
          <a name="image"></a> 
					<div class="image" id = "image<?php echo $x; ?>" style="<?php if($x==1){ echo 'display:block;';}else{ echo 'display:none;';}?>max-width:600px;max-height:400px;" align = "center" valign = "center">
						<img src = "<?php echo base_url().$f->path;?>" width="auto" height="auto">
					</div>

					<div class="imagesthumb" align="center" valign ="middle">
					<?php
							# code...
						}
						$x = 0;
						foreach ($fotos as $f) {
							$x++;
					?>
					<a href="#image" id = "imthumb<?php echo $x; ?>">
						<img src = "<?php echo base_url().$f->path_thumb;?>">
					</a>
					<?php
						# code...
					}
				?>
					</div>
					
				</td>
				<td  width="50%" align="center" valign="top">
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