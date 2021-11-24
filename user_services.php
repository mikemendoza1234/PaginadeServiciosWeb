<?php  
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>Ejemplos de Bootstrap</title>
	<meta name="vieport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Framework Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>
	<div class="container">
		<div class="cajaPrincipal">
			<div class="container">
				<!-- Barra de Navegación -->
				<div>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<div class="container-fluid">
							<a href="#" class="navbar-brand"> Computer Services Inc</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2">
								<span class="navbar-toggler-icon"></span>
							</button>
							
						</div>			
					</nav>
				</div>
				<br>
				<!-- Banner de la pagina -->
				<div class="row">
					<div class="col-md-12 ">
						<div class="fondo6">
							<img class="escalar" src="img/banner_services.jpg" alt="servicios">	
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="container">
					<div class="alert alert-info">Seleccione los servicios que usted requiere</div>	
				</div>
				<!-- Formulario con Buttons-->
				<form action="process_user_services.php" method="post">
					<!-- Primera fila de servicios -->
					<div class="row">
						<!-- Cada servicio tendrá una separación de 
							una columna entre cada servicio
						 -->
						<div class="col-md-1"></div>
						<div class="col-md-3 cajaServicios">
							<!-- Dentro de cada servicio se colocará
								su imagen, su descripción 
								y su Check Box
							-->
							<div class="row">
								<div>
									<img src="img/limpieza.jpg" alt="limpieza">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="limpieza">
										<label class="form-check-label">Limpieza de PC</label>
										<p>
											<br>Costo $4000
											<br>Tiempo estimado: 2 Horas
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2 cajaServicios">
							<div class="row">
								<div>
									<img class="escalacol3" src="img/windows.png" alt="asa">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="windows">
										<label class="form-check-label">Instalación de Windows</label>
										<p>
											<br>Costo $1000
											<br>Tiempo estimado: 1 Hora
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-3 cajaServicios">
							<div class="row">
								<div>
									<img src="img/software.jpg" alt="software">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="software">
										<label class="form-check-label">Instalación de<br>Software/Drivers</label>
										<p>
											<br>Costo $500
											<br>Tiempo estimado: 45 minutos
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div> <!-- Fin de la primera fila de servicios -->

					<!--  -->
					<br>
					<br>
					<!--  -->

					<!-- Segunda fila de servicios -->
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-3 cajaServicios">
							<div class="row">
								<div>
									<img src="img/mantenimiento.jpg" alt="">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="mantenimiento">
										<label class="form-check-label">Mantenimiento <br> Correctivo y preventivo</label>
										<p>
											<br>Costo $2000
											<br>Tiempo estimado: 2 Horas
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2 cajaServicios">
							<div class="row">
								<div>
									<img src="img/respaldo.jpg" alt="">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="respaldo">
										<label class="form-check-label">Respaldo de Archivos</label>
										<p>
											<br>Costo $700
											<br>Tiempo estimado: 1.5 Horas
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-3 cajaServicios">
							<div class="row">
								<div>
									<img src="img/reparacion.jpg" alt="">
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="p[]" value="reparacion">
										<label class="form-check-label">Reparación</label>
										<p>
											<br>Costo $7000
											<br>Tiempo estimado: 3 Horas
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div> <!-- Fin de la segunda fila de servicios -->
					<br>
					<button type="submit" class=" btn-lg btn-primary">Enviar servicios</button>
				</form>	 <!-- Fin del formularios -->
				

				<br>
				<br>
				<br>
				<hr>
				<?php include ("tabla_info.php") ?>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- Librerias JQuery -->
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>

