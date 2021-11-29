<?php

class Modelo {
    static function RutasModelo($rutas){
        if($rutas == "mostrar" || $rutas == "user_services" || $rutas == "process_user_services" || $rutas == "register" || $rutas == "calendario" 
        || $rutas == "historial" || $rutas == "actividades" || $rutas == "alta_servicios" || $rutas == "new_technice" || $rutas == "graficar"){
			$pagina = "vista/modulos/".$rutas.".php";
            return $pagina;
		}     
        elseif($rutas == "loginerror"){
            return "vista/modulos/loginerror.php";
        }
        else return "vista/modulos/login.php";
    }
}