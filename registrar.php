<?php
	include("conexion.php");
	
	$link = Conectar();
	$query = "SELECT * FROM usuario";
	
	$consulta = mysqli_query($link,$query);
	$num_id = mysqli_num_rows($consulta);

	$id = $num_id+1;
	$name = $_REQUEST['name'];
	$username = $_REQUEST['user'];
	$phone = $_REQUEST['phone'];
	$password = $_REQUEST['password'];



	$query = "INSERT INTO usuario (usuario_id, nombre, usuario, passwd, telefono) VALUES ('$id', '$name', '$username', '$password', '$phone')";
	if (mysqli_query($link,$query)) {
		//Validación de registro
		header("location: login.php?succes=1");
      	echo "New record created successfully";
	} else {
	      echo "Error: " . $query . "<br>" . mysqli_error($link);
      	header("location: registererror.php?err=0");
	}
	mysqli_close($link);

?>