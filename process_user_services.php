<?php  
session_start();
$username = $_SESSION['id'];
?>
<html>
<head>
	<meta charset="utf-8">	
	<title>Servicios Seleccionados</title>
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
					<div class="alert alert-info">
						<?php  
						print($username);
						?>
						, Los servicios seleccionados son
					</div>	
					<br>
				</div>
				<!-- Formulario con Buttons-->
				<?php 
				include("conexion.php");

					$link = Conectar();
					$contadorL = 0;
					$costoTotal = 0;
					$numServicios = 0;
					$tiempoTotal = 0;
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
									$numServicios++;
									print("$numServicios");
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
									$tiempoTotal += $fila[4];
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
						<div class="col-md-6">
							<?php
								print(" <strong><br>Total de Servicios : " .$numServicios. "</strong>");
							?>		
						</div>
						<div class="col-md-2">
							<?php		
								print("<strong><br>Tiempo Total : " .$tiempoTotal. " hrs </strong>" );
							?>		
						</div>
						<div class="col-md-4">
							<br>
					<?php		
						print("<strong>Costo Total : $" .$costoTotal. "</strong>");
					?>
						</div>
					</div>
					<br>
					<br>
					<br>
					<hr>

					<div class="container">
						<div class=" alert alert-primary">
							Selecciona una fecha y hora para tus servicios
						</div>
					</div>
					<div class="container">
						Fecha del pedido: 
						<?php 
							print(date("d-m-Y H:i:s"));
						 ?>
						 <br>	
						 Folio del pedido
						 <?php 
							$query = "SELECT * FROM pedidos";
							$consulta 	= mysqli_query($link,$query);
							$num_id = mysqli_num_rows($consulta);
						 	$folio = date("Ydm");
						 	$folio = $folio. $num_id+1;
							print($folio);
						 ?>
					</div>
					<form action="#" method="post">
							<div class="container caja">
								Selecciona una fecha para tus servicios
								<br>
								<hr>
								Calendario
								<br>	
								Seleccionar Fecha
								<br>	
								<strong>Selecciona la Hora</strong>
								<br>
								<div class="mb-3">
									<select class="form-select" name="hora" required>
										<option value="12">12:00pm</option>
										<option value="1">01:00pm</option>
										<option value="2">02:00pm</option>
										<option value="3">03:00pm</option>
										<option value="4">04:00pm</option>
										<option value="5">05:00pm</option>
										<option value="5">06:00pm</option>
									</select>		
								</div>					
								<br>	
								<div class="row">
									<div class="col-8">	
										<br>
										<br>
										<button type="submit" class="btn-lg btn-success">Confirmar Cita</button>
									</div>
									<div class="col-4">
										<label class="form-label"><strong> Notas para el tecnico</strong></label>
										<textarea class="form-control" rows="2" name="notas"></textarea>
									</div>
								</div>
								<hr>
								
							</div>

					</form>
					
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





