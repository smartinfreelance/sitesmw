<div id = "main-content">
	<div class = "container">	
		<div class="nonboxy-widget">
			<?php $nombre = "Martin"; ?>
			<div class="widget-head">
				<h5>Informacion Personal</h5>
			</div>
			<dl class="dl-horizontal">
				<dt>Nombre</dt>
				<dd><?php echo $this->session->userdata('nombre'); ?></dd>
				<dt>Apellido</dt>
				<dd><?php echo $this->session->userdata('apellido'); ?></dd>
				<dt>Usuario</dt>
				<dd><?php echo $this->session->userdata('usuario'); ?></dd>
				<dt>Fecha de Nacimiento</dt>
				<dd><?php echo $this->session->userdata('fecha_nac'); ?></dd>
				<dt>E-mail</dt>
				<dd><?php echo $this->session->userdata('mail'); ?></dd>
			</dl>
			<div class="widget-head">
				<h5>Puntuacion</h5>
			</div>
			<dl>
				<dt>Puntos Acumulados</dt>
				<dd><?php echo $puntos; ?></dd>
			</dl>


			<div class="widget-head">
				<h5>Colaboraciones</h5>
			</div>
			<div class="widget-block">
				<div class="widget-head">
					<h5>Cursos creados</h5>
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
								foreach($cursos as $c)
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
										<?php echo $c->estado; ?>
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
</div>
<?php
	function timestamp_formateado($fecha_ts){
		list($fecha, $hora) = explode(" ", $fecha_ts);
		list($anio,$mes,$dia) = explode("-",$fecha);
		$fecha_ddmmaaaa = $dia."-".$mes."-".$anio;

		return $fecha_ddmmaaaa;

	}
?>