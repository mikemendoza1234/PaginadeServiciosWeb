<?php 
print("Los lenguajes seleccionados en el formulario son <br>");
	$contadorL = 0;
	if (isset($_REQUEST['p'])) {
		$contadorL = count($_REQUEST['p']);
		$listaL = $_REQUEST['p'];
		for ($i=0; $i < $contadorL; $i++) { 
			print(" <span style = >  <strong> " .$listaL[$i] . "</strong> </span> <br>");
		}
	}else{
		print("No hay lenguajes seleccionados <br>");
	}
?>