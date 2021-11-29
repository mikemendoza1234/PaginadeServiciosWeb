<?php 
	function Conectar(){
		$servername = 'bufurlcqychhpp6jyg9f-mysql.services.clever-cloud.com';
		$database = 'bufurlcqychhpp6jyg9f';
		$username = 'ujrny0fewond7qdd';
		$password = '2WhBQFR5jB743T5U0g2e';
		// $servername = 'localhost:3309';
		// $database = 'pruebas';
		// $username = 'root';
		// $password = '';

		//Crear conexión
		if(!($conn = mysqli_connect($servername, $username, $password))){
		//	print("Error al conectarse a la base de datos <br>");
			//exit();
		}else{
		//	print("Conexión Exitosa <br>");
		}

		if(!mysqli_select_db($conn, $database)){
		//	print("Error al conectarse a la base de datos <br>");
		//	exit();
		}else{
		//	print("Conexión Exitosa a la base de datos [$database]<br>");	
		}

		return $conn;
	}
?>