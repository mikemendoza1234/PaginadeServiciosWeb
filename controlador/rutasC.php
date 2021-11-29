<?php

class RutasControlador{
	public function Rutas(){

		if(isset($_GET["ruta"])){
			$ruta = $_GET["ruta"];

		}
		else{
			$ruta = "index";			
		}
		
		$respuesta = Modelo::RutasModelo($ruta);
		include $respuesta;
	}
}