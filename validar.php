<?php 
	include("conexion.php");
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['password'];

	$link = Conectar();
	//$query = "SELECT * FROM usuario WHERE usuario = '$user'";
	$query = "SELECT usuario,passwd  FROM usuario WHERE usuario = '" . $user . "'";
	$consulta = mysqli_query($link,$query);
	$datos = mysqli_num_rows($consulta);
	
	//while ($other = mysqli_fetch_array($consulta)) {
	//	echo $other['usuario'];
	//}


	if ($datos == 1)
	{
		while($fila = mysqli_fetch_row($consulta)){

			if($fila[1] == $pass)
			{
				session_start();
				$_SESSION['id'] = $fila[0];
				header("location: user_services.php");
				print("Ir a pagina de usuarios");
			}
			else
			{
				header("location: loginerror.php?err=1");
			}			
		}
	}
	elseif ($datos > 1) {
		print("Error al consultar la base de datos, contactar al Administrador");
	}
	elseif ($datos == 0){
		header("location: loginerror.php?err=0");
	}

	print("<br>");
	print("<a href = login.php>Inicio</a> ");

?>
