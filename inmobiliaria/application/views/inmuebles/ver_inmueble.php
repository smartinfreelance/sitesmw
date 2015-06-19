<style type="text/css">
  #map-canvas { height: 350px;width:350px; }
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
      title: '<?php echo $inmueble->direccion.", ".$inmueble->nombre_localidad.", ".$inmueble->nombre_departamento; ?>'
  	});
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>


<div id = "main-content">
	<div class = "container">
    <div class="page-header">
      <h1><?php echo $inmueble->direccion; ?> <small><?php echo ", ".$inmueble->nombre_localidad.", ".$inmueble->nombre_departamento; ?></small></h1>
    </div>
    <div class = "row">
      <div class = "span6">
          <?php
            $x = 0;
            foreach ($fotos as $f) {
              $x++;
          ?>
            <a name="image"></a> 
            <div class="image" id = "image<?php echo $x; ?>" style="<?php if($x==1){ echo 'display:block;';}else{ echo 'display:none;';}?>max-width:600px;max-height:400px;" align = "center" valign = "center">
              <img src = "<?php echo base_url().$f->path;?>" width="auto" height="auto">
            </div>
            <?php
              }
              if($x==0){
            ?>
              <div class="image" id = "image1" style="display:block;max-width:600px;max-height:400px;" align = "center" valign = "center">
                <img src = "<?php echo base_url()."uploads/fotos_inmuebles/sinimagen.png";?>" width="auto" height="auto">
              </div>
            <?php
              }
              $x = 0;
            ?>
            <div class="imagesthumb" align="center" valign ="middle">
            <?php
              foreach ($fotos as $f) {
                $x++;
            ?>
            <a href="#image" id = "imthumb<?php echo $x; ?>">
              <img src = "<?php echo base_url().$f->path_thumb;?>">
            </a>
            <?php
            }
            if($x==0){
            ?>
            <a href="#image" id = "imthumb1">
              <img src = "<?php echo base_url()."uploads/fotos_inmuebles/sinimagen_thumb.png";?>">
            </a>
            <?php
              }
            ?>
            </div>
            
        
      </div>

      <div class = "span6">
        <div id="map-canvas"></div>
      </div>
    </div>
    <div class="span12">
        <div class="widget-block">
          <div class="widget-head">
            <h5><i class="icon-list"></i>Caracteristicas</h5>
          </div>
          <div class="widget-content">
            <div class="widget-box">
              <div class="white-box well">
                <h3>Breve descripcion:</h3>
                <p>
                  <?php echo $inmueble->tipo_inmueble." en ".$inmueble->operacion." en ".$inmueble->nombre_localidad.".";?>
                </p>
                <p>
                  <?php echo "Estado: ".$inmueble->nombre_einmueble;?>
                </p>
                <p>
                  <?php echo "Antiguedad: ".$inmueble->antiguedad;?>
                </p>
                <h3>Lead body copy</h3>
                <p>
                  Make a paragraph stand out by adding <code>.lead</code>.
                </p>
                <p class="lead">
                  Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
                </p>
                <blockquote>
                  <p>
                     Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                  </p>
                </blockquote>
                <blockquote class="quote_blue">
                  <p>
                     Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                  </p>
                </blockquote>
                <blockquote class="quote_orange">
                  <p>
                     Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                  </p>
                </blockquote>
                <blockquote class="quote_pink">
                  <p class=" quote">
                     Cras erat diam, consequat quis tincidunt nec, eleifend a turpis. Aliquam ultrices feugiat metus, ut imperdiet erat mollis at. Curabitur mattis risus sagittis nibh lobortis vel.
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
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