<style type="text/css">
  #map-canvas { height: 450px;width:100%; }
  #imagecontainer {
    width: 100%;
    height: 375px;
    vertical-align:middle;
    background-size:contain;
}
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
        <div id = "imagecontainer">
          <?php
            $x = 0;
            foreach ($fotos as $f) {
              $x++;
          ?>
            <a name="image"></a> 
            <div class="image" id = "image<?php echo $x; ?>" style="<?php if($x==1){ echo 'display:block;';}else{ echo 'display:none;';}?>" align = "center" valign = "center">
              <img src = "<?php echo base_url().$f->path;?>" style = "max-height:375px;">
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
        </div>
        <div class="imagesthumb" align="center" valign ="middle">
          <?php
            foreach ($fotos as $f) {
              $x++;
          ?>
          <a id = "imthumb<?php echo $x; ?>">
            <img src = "<?php echo base_url().$f->path_thumb;?>">
          </a>
          <?php
          }
          if($x==0){
          ?>
          <a id = "imthumb1">
            <img src = "<?php echo base_url()."uploads/fotos_inmuebles/sinimagen_thumb.png";?>">
          </a>
          <?php
            }
          ?>
        </div>
      </div>

      <div class = "span6">
        <div id="map-canvas" style="width:100%"></div>
      </div>
    </div>
    <hr />
    <div class="span12">
      <h2>Caracteristicas</h2>
      <h3>Datos Básicos</h3>
      <?php echo "<strong>Ubicacion</strong>: ".$inmueble->nombre_provincia; ?>, 
      <?php echo $inmueble->nombre_departamento; ?>,
      <?php echo $inmueble->nombre_localidad; ?><br />
      <?php echo "<strong>Direccion</strong>: ".$inmueble->direccion; ?><br />
      <?php echo "<strong>Antiguedad</strong>: ".$inmueble->antiguedad." años."; ?><br />
      <?php echo "<strong>Operacion</strong>: ".$inmueble->operacion; ?><br />
      <?php echo "<strong>Moneda</strong>: ".$inmueble->moneda; ?><br />
      <?php echo "<strong>Precio</strong>: ".$inmueble->precio; ?><br />
      <?php echo "<strong>Descripcion</strong>: ".$inmueble->descripcion; ?><br />
      <?php echo "<strong>Estado</strong>: ".$inmueble->estado_inmueble; ?><br />      

      <?php echo "<strong>Tipo Inmueble</strong>: ".$inmueble->tipo_inmueble; ?><br />      
      <?php echo "<strong>Contacto</strong>: ".$inmueble->contacto; ?><br />      
      <br />      
      <h3>Superficie</h3>      
      <?php echo "<strong>Superficie Cubierta</strong>: ".$inmueble->superficie_cubierta."m<sup>2</sup>"; ?><br />      
      <?php echo "<strong>Superficie Descubierta</strong>: ".$inmueble->superficie_descubierta."m<sup>2</sup>"; ?><br />      
      <br />      
      <h3>Ambientes</h3>
        <ul>
      <?php
        foreach($ambientes as $a){
      ?>
          <li>
            <?php echo $a->nombre_ambiente;?>
          </li>

      <?php
        }
      ?>
        </ul>
      <br />      
      <h3>Instalaciones</h3>
        <ul>
      <?php
        foreach($instalaciones as $i){
      ?>
          <li>
            <?php echo $i->nombre_instalacion;?>
          </li>

      <?php
        }
      ?>
        </ul>

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