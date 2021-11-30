<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <!-- Framework Bootstrap -->
    <link rel="stylesheet" href="vista/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vista/css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="vista/css/bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include('menu.php') ?>

    <div class="container">
		<div class="cajaPrincipal">
			<div class="container">
				<br>

				<div class="container">
					<div class="alert alert-info">
                    <h1 class="">Registro de tecnico nuevo</h1>
                    </div>	
				</div>
				<div class="container">
					<div class="caja">
						<div class="row">
							<div class="col-12">
								<form method="post">
									<div>
										<div class="form-group">
											<label class="form-label">Nombre Completo</label>
											<div class="input-group">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card fa-2x"></i></span>
												<input class="form-control" name="name_t" placeholder="Su nombre completo" required>	
											</div>	
										</div>									
										 <div class="form-group">                       
										 	<label class="form-label">Número de empleado / código</label>
											<div class="input-group mb-2">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-user fa-2x"></i></span>
											  	<input class="form-control" type="text" name="user_t" placeholder="Su Usuario" required>
											</div>
										</div>

										<div class="form-group">
											<label class="form-label">Contraseña</label>
											<div class="input-group mb-2">
						                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock fa-2x"></i></span>
						                          <input class="form-control" type="password" name="password_t" placeholder="Su contraseña" required>	
						                    </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<br>
											<button type="submit" class=" btn btn-primary">Registrar</button>	
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
				
			</div>
		</div>
</body>
</html>

<?php
$new_technice = new TallerC();
$new_technice -> new_technice();


?>