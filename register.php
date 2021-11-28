<?php  
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>Registro Usuarios</title>
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
							<a href="login.php" class="navbar-brand"> Computer Services Inc</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2">
								<span class="navbar-toggler-icon"></span>
							</button>
							
						</div>			
					</nav>
				</div>
				<br>

				<div class="container">
					<div class="alert alert-info">Por favor, llene el formulario de registro</div>	
				</div>
				<div class="container">
					<div class="caja">
						<div class="row">
							<div class="col-12">
								<h2>Registro</h2>
								<form action="#" method="post">
									<div>
										<div class="form-group">
											<label class="form-label">Nombre Completo</label>
											<div class="input-group">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card fa-2x"></i></span>
												<input class="form-control" name="name" placeholder="Su nombre completo" required>	
											</div>	
										</div>									
										 <div class="form-group">                       
										 	<label class="form-label">Nombre de Usuario</label>
											<div class="input-group mb-2">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-user fa-2x"></i></span>
											  	<input class="form-control" type="text" name="user" placeholder="Su Usuario" required>
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Teléfono</label>
											<div class="input-group mb-2">
						                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone fa-2x"></i></span>
						                          <input class="form-control" name="phone" placeholder="Su teléfono" required>	
						                    </div>
										</div>

										<div class="form-group">
											<label class="form-label">Contraseña</label>
											<div class="input-group mb-2">
						                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock fa-2x"></i></span>
						                          <input class="form-control" type="password" name="password" placeholder="Su contraseña" required>	
						                    </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<br>
											<button type="submit" class=" btn btn-primary">Registrarme</button>	
										</div>
										<div class="col-md-6">
										</div>
									</div>
									<br>
									<br>
									
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

