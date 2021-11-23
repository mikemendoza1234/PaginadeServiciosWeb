<?php 
	function Conectar(){
		$servername = 'localhost';
		$database = 'prueba';
		$username = 'root';
		$password = '';

		//Crear conexión
		if(!($conn = mysqli_connect($servername, $username, $password))){
			print("Error al conectarse a la base de datos <br>");
			exit();
		}else{
			print("Conexión Exitosa <br>");
		}

		if(!mysqli_select_db($conn, $database)){
			print("Error al conectarse a la base de datos <br>");
			exit();
		}else{
			print("Conexión Exitosa a la base de datos [$database]<br>");	
		}

		return $conn;
	}
?>