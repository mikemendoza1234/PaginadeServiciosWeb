<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Framework Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include('menu.php') ?>
    <div class="container">
        <div class="cajaPrincipal">
            <div class="container">
                <br>

                <div class="container">
                    <div class=" alert alert-info">
                        <h1 class="">Registro de servicio nuevo</h1>
                    </div>
                </div>

                <div class="container">
                    <div class="caja">
                        <div class="row">
                            <div class="col-12">
                                
                                <form method="post">
                                    <div>
                                        <div class="form-group">
                                            <label class="form-label">Nombre</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate fa-2x"></i></span>
                                                <input class="form-control" name="name_s" placeholder="Nombre del servicio" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Clave</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-barcode fa-2x"></i></span>
                                                <input class="form-control" type="text" name="clave_s" placeholder="Clave del servicio" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Precio</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-tag fa-2x"></i></span>
                                                <input class="form-control" type="numeric" name="precio_s" placeholder="Precio del servicio" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Duración</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-hourglass-end fa-2x"></i></span>
                                                <input class="form-control" type="numeric" name="time_s" placeholder="Duracion del servicio en horas" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br>
                                            <button type="submit" class="btn btn-primary titulos">Guardar</button>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>

</body>

</html>


<?php
$new_service = new TallerC();
$new_service -> new_service();


?>