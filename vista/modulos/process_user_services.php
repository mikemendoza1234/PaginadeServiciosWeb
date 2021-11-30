<html>
<head>
	<meta charset="utf-8">	
	<title>Servicios Seleccionados</title>
	<meta name="vieport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Framework Bootstrap -->
	<link rel="stylesheet" href="vista/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vista/css/loginstyle.css">
	<link rel="stylesheet" type="text/css" href="vista/css/bootstrap/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="cajaPrincipal">
			<div class="container">
				<!-- Barra de Navegación -->
				<div>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<div class="container-fluid">
							<a href="login.php" class="navbar-brand"> Computer Services Inc</a>
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
					<div class="alert alert-info">Los servicios seleccionados son</div>	
					<br>
				</div>
				<!-- Formulario con Buttons-->
				<?php 
				include("conexion.php");

					$link = Conectar();
					$contadorL = 0;
					$costoTotal = 0;
					if (isset($_REQUEST['servicios'])) {
						$contadorL = count($_REQUEST['servicios']);
						$listaL = $_REQUEST['servicios'];
					?>
					<div class=" row container">
						<div class=" col-md-3">
							<strong>Numero de Servicio</strong>
						</div>
						<div class=" col-md-3">
							<strong>Descripción</strong>
						</div>
						<div class=" col-md-3">
							<strong>Tiempo Estimado</strong>
						</div>
						<div class=" col-md-3">
							<strong>Costo</strong>
						</div>
						
					</div>
					<?php
						for ($i=0; $i < $contadorL; $i++) {
					?>
					<div class="row container">
						<?php
							//print("<div><strong>" .$listaL[$i] . "</strong><br>");
							$seleccion = 'SELECT * FROM servicios WHERE clave = "'.$listaL[$i].'"' ;
							$consulta = mysqli_query($link, $seleccion);
							while ($fila = mysqli_fetch_row($consulta)){
						?>
						<div class="col-md-3">
						<?php
							//Contador
									print("$fila[0]");
						?>
						</div>
						<div class="col-md-3">
						<?php
							//Descripcion del servicio
									print("$fila[1]");
						?>
						</div>
						<div class="col-md-3">
						<?php
							//Tiempo del servicio
									print("$fila[4] Hora/s");
						?>
						</div>
						<div class="col-md-3">
						<?php
							//Costo
									print("$$fila[3] ");
									$costoTotal = $costoTotal + $fila[3];
						?>
						</div>
						<?php
								}
						?>
					</div>							
					<?php  
						}
					}else{
						print("No hay servicios seleccionados <br>");
					}
					?>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<br>
					<?php		
						print("Costo Total : $" .$costoTotal);
					?>
						</div>
					</div>
					<?php 
					
					?>
				
				<?php 
				?>
				
				

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





