<?php

//archivos controlador
require_once "controlador/rutasC.php";
require_once "controlador/TallerC.php";

//archivos modelo
require_once "modelo/conexionDB.php";
require_once "modelo/rutaM.php";
require_once "modelo/TallerM.php";


$rutas = new RutasControlador();
$rutas -> Rutas();