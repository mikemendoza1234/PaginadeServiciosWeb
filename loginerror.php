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

				<div class="container">
					<div class="alert alert-danger">Usuario y contraseña incorrectos, intente de nuevo</div>	
				</div>
				<div class="container">
					<div class="caja">
						<div class="row">
							<div class="col-12">
								<h2>Login</h2>
								<form action="validar.php" method="post">
									<div>
										 <div class="form-group">                       
										 	<label class="form-label">Usuario</label>
											<div class="input-group mb-2">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-user fa-2x"></i></span>
											  	<input class="form-control" type="text" name="user" placeholder="Su Usuario">
											</div>                                                  
					                    </div>

										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<div class="form-group">
						                       <div class="input-group mb-2">
						                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock fa-2x"></i></span>
						                          <input class="form-control" type="password" name="password" placeholder="Su contraseña" required>	
						                        </div>
						                    </div>
										</div>
									</div>
									<hr>
									<br>
									<br>
									<button type="submit" class="btn-primary">Enviar</button>	
								</form>
							</div>
						</div>
					</div>			
				</div>
				<br>
				<br>
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

