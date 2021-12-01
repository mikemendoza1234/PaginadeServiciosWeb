<?php
session_start();
$reg_pedido = new TallerC();
$reg_pedido-> reg_pedido();
?>
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
				<?php include('menu_user.php') ?>
				<br>
				<!-- Banner de la pagina -->
				<div class="row">
					<div class="col-md-12 ">
						<div class="fondo6">
							<img class="escalar" src="vista/img/banner_services.jpg" alt="servicios">	
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="container">
					<div class="alert alert-info">
						Los servicios seleccionados son
					</div>	
					<br>
				</div>
				<!-- Formulario con Buttons-->
				<?php
						$showsel_services = new TallerC();
						$showsel_services -> showsel_services();
				?>
				

				<br>
				<br>
				<br>
				<hr>

				<div class="container">
						Fecha del pedido: 
						<?php 
							print(date("d-m-Y H:i:s"));
						 ?>
						 <br>	
						 Folio del pedido
						 <?php 
						 	$gen_folio = new TallerC();
							$gen_folio -> get_folio();
						 ?>
					</div>
					<form method="post">
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
										<option value="12:00:00">12:00pm</option>
										<option value="1:00:00">01:00pm</option>
										<option value="2:00:00">02:00pm</option>
										<option value="3:00:00">03:00pm</option>
										<option value="4:00:00">04:00pm</option>
										<option value="5:00:00">05:00pm</option>
										<option value="6:00:00">06:00pm</option>
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





