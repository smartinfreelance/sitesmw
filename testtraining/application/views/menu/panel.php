<div id = "main-content">
	<div class = "container">	
		<div class="page-header">
			<h1>Test Training <small>porque el saber no ocupa lugar</small></h1>
		</div>
		<div class="widget-block">
			<div class="widget-head">
				<h5>Tests</h5>
				<div class="widget-control pull-right">
					<a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo anchor('topics/setNewCourse/',"<i class='icon-plus'></i> Agregar Nuevo</a>"); ?></li>
					</ul>
				</div>
			</div>
			<div class="widget-content">
				<div class="widget-box">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Topic
								</th>
								<th>
									Descripcion
								</th>
								<th>
									Creado por
								</th>
								<th>
									Valoracion
								</th>
								<th>
									Fecha de creacion
								</th>
								<th>
									Acciones
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($topics as $c)
							{
						?>
							<tr>
								<td>
									<?php echo $c->id; ?>
								</td>
								<td>
									<?php echo $c->topic; ?>
								</td>
								<td>
									<?php echo $c->descripcion; ?>
								</td>
								<td>
									<?php echo $c->nombre_usuario." ".$c->apellido_usuario; ?>
								</td>
								<td>
									<?php 
										for($i = 0; $i < $c->valoracion; $i++){
											echo "<span class='color-icons star_2_co'></span>"; 
										}
									?>
								</td>
								<td>
									<?php echo timestamp_formateado($c->fecha_alta); ?>
								</td>
								<td>
									<div class="btn-group closed">
			                            <button data-toggle="dropdown" class="btn dropdown-toggle">Accion <span class="caret"></span></button>
			                            <ul class="dropdown-menu">
										<?php
											foreach($li_content as $lc){
												if($lc['id_topic'] == $c->id){
													if($lc['ver_ml']){
										?>			                            	
							                            <li><?php echo anchor('preguntas/modoLectura/'.$c->id, "<span class = 'color-icons book_open_co'></span>Modo Lectura"); ?></li>
							            <?php
							            			}
							            ?>
				                                <li><?php echo anchor('preguntas/unaPregunta/'.$c->id, "<span class = 'color-icons clock_co'></span>Modo Preguntados (".$lc['vidas_mp'].")"); ?></li>
				                                <li><?php echo anchor('preguntas/modoSimulador/'.$c->id, "<span class = 'color-icons list_bullets_co'></span>Modo Simulador (".$lc['vidas_ms'].")"); ?></li>
										<?php
												}
											}
										?>			                    			                            
			                              <li class="divider"></li>
			                              <li><a href="#"><span class = "color-icons medal_gold_1_co"></span>Ranking</a></li>
			                            </ul>
		                          	</div>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	function timestamp_formateado($fecha_ts){
		list($fecha, $hora) = explode(" ", $fecha_ts);
		list($anio,$mes,$dia) = explode("-",$fecha);
		$fecha_ddmmaaaa = $dia."-".$mes."-".$anio;

		return $fecha_ddmmaaaa;

	}
?>