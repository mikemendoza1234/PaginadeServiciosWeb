<?php 
	include("conexion.php");
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['password'];

	$link = Conectar();
	$query = "SELECT USER, PASSWD FROM usuarios WHERE USER = '" . $user . "'";
	$consulta = mysqli_query($link,$query);
	$datos = mysqli_num_rows($consulta);

	if ($datos == 1)
	{
		while($fila = mysqli_fetch_row($consulta)){
			if($fila[1] == $pass)
			{
				session_start();
				$_SESSION['id'] = $fila[0];
				//header("location: login.php");
				print("Ir a pagina de usuarios");
			}
			else
			{
				header("location: loginerror.php?err=0");
			}			
		}
	}
	elseif ($datos > 1) {
		print("Error al consultar la base de datos, contactar al Administrador");
	}
	elseif ($datos == 0){
		header("location: loginerror.php?err=1");
	}

	print("<br>");
	print("<a href = index.php>Inicio</a> ");

?>
