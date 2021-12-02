<?php
session_start();
?>
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
</head>
<body>
    <?php include('menu.php') ?>
    <div class="container">
        <div class="caja">
            <h1>Servicios pendientes</h1>
            <br>
            <form method="POST" action="index.php?ruta=actividades">
                <?php 
                $show = new TallerC();
                $show->button_Selected();
                ?>
                <div class="form-control">
                    <button name="cambios" class="btn-lg btn-primary">Enviar</button>
                </div>
            </form> 
        </div>
    </div>
    
</body>
</html>