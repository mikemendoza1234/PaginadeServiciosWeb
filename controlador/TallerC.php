<?php
class TallerC{

    public function IsUser(){
        if(isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["tipo_usuario"])){
            $user = $_POST["user"];
            $passw = $_POST["password"];
            $user_type = $_POST["tipo_usuario"];

            if($user_type == 'U'){
                $query = "SELECT * FROM usuario WHERE usuario = '$user' AND passwd = '$passw'";
                $response = TallerM::isUserM($query);
                
                
                if ($response["usuario_id"] > 0)
                {
                    $_SESSION['id'] = $response["usuario_id"];
                    $_SESSION['user'] = $response["usuario"];
                    header("location: ?ruta=user_services");
                    
                               
                }
                else
                    header("location: ?ruta=loginerror");
            }
            /**********************************        LOGIN FOR TECHNICIANS      ************************************* */
            else{
                $query = "SELECT * FROM tecnico WHERE numero_empleado = '$user' AND passwd = '$passw'";
                $response = TallerM::isUserM($query);
                if ($response["tecnico_id"] > 0)
                {
                    $_SESSION['id'] = $response["tecnico_id"];
                    $_SESSION['id'] = $response["numero_empleado"];
                    header("location: ?ruta=calendario");
                    
                               
                }
                else
                    header("location: ?ruta=loginerror");

                
            }  
            
        }
    }
    public function new_user(){
        if(isset($_POST["name_r"]) && isset($_POST["user_r"]) && isset($_POST["phone"])  && isset($_POST["password_r"])){
            $name = $_POST["name_r"];
            $user = $_POST["user_r"];
            $phone = $_POST["phone"];
            $passw = $_POST["password_r"];

            $query = "INSERT INTO usuario (nombre, usuario, passwd, telefono) VALUES ('$name', '$user', '$passw', '$phone');";
            $response = TallerM::insert($query);
            if($response) header("location: ?ruta=logi");
            else 
                echo'<script type="text/javascript">
                    alert("Verifica los datos proporcionados en el formulario");
                    window.location.href="index.php?ruta=register";
                    </script>';
            
            
            

        }

    }

    public function new_service(){
        if( isset($_POST["name_s"]) && isset($_POST["clave_s"]) && isset($_POST["precio_s"])  && isset($_POST["time_s"]) && isset($_POST["description_s"]) ){
            $name_service = $_POST["name_s"];
            $key_service = $_POST["clave_s"];
            $price = $_POST["precio_s"];
            $service_duration = $_POST["time_s"];
            $description = $_POST["description_s"];

            $query = "INSERT INTO servicios (nombre, clave, precio, duracion_hrs, descripcion) VALUES ('$name_service', '$key_service', $price, $service_duration, '$description');";
            $response = TallerM::insert($query);
            if(!($response))
                echo'<script type="text/javascript">
                    alert("Verifica los datos proporcionados en el formulario");
                    window.location.href="index.php?ruta=alta_servicios";
                    </script>';
            

        }
    }


    public function new_technice(){
        if( isset($_POST["name_t"]) && isset($_POST["user_t"]) && isset($_POST["password_t"])){
            $name_technice = $_POST["name_t"];
            $user = $_POST["user_t"];
            $passw = $_POST["password_t"];

            $query = "INSERT INTO tecnico (nombre, numero_empleado, passwd) VALUES ('$name_technice', '$user', '$passw')";
            $response = TallerM::insert($query);
            if(!($response))
                echo'<script type="text/javascript">
                    alert("Verifica los datos proporcionados en el formulario");
                    window.location.href="index.php?ruta=alta_servicios";
                    </script>';

        }
    }


    public function list_services(){
        $query = "SELECT * FROM servicios";
        $response = TallerM::Select($query);
        $count = 0;
        $catalgo = null;
        foreach($response as $key => $value){
            if ($count%3 == 0) {
                echo '<div class = "row">'; 
            }
            $catalgo = '
                    <div class="col-md-3 cajaServicios">
                        <div class="row">
                            <div>
                                <img class="escalacol3" src="vista/img/windows.png" alt="asa">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="servicios[]" value='.$value["servicio_id"].'>
                                    <label class="form-check-label">'.$value["nombre"].'</label>
                                    <p>
                                        <br> Costo: $'.$value["precio"].'
                                        <br>Tiempo estimado: '.$value["duracion_hrs"].' Hora(s)
                                        <br> Descripción: '.$value["descripcion"].'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                    <br>              
                ';
                
            echo $catalgo;
            if ($count > 0) {
                if (($count + 4)%3 == 0) {
                    echo '</div><br>';

                }
            }
            $count++;
        }
    }

    public function showsel_services(){
        $contadorL = 0;
        $costoTotal = 0;
        $numServicios = 0;
        $tiempoTotal = 0;       
        if (isset($_REQUEST['servicios'])) {
            $contadorL = count($_REQUEST['servicios']);
            $listaL = $_REQUEST['servicios'];

            $_SESSION['contadorL']= $contadorL;
            $_SESSION['listaL']= $listaL;

            echo '<div class=" row container">
                        <div class=" col-md-3">
                            <strong>Numero de Servicio</strong>
                        </div>
                        <div class=" col-md-3">
                            <strong>Descripción</strong>
                        </div>
                        <div class=" col-md-3">
                            <strong>Tiempo Estimado</strong>
                        </div>
                        <div class=" col-md-3">
                            <strong>Costo</strong>
                        </div>
                    </div>';

            for ($i=0; $i < $contadorL; $i++) {
                $query = 'SELECT * FROM servicios WHERE servicio_id = "'.$listaL[$i].'"' ;
                $response = TallerM::Select($query);
                foreach($response as $key => $value)
                {

                echo '
                    <div class="row container">
                        <div class="col-md-3">
                            '.++$numServicios.'
                        </div>
                        <div class="col-md-3">
                               '.$value["nombre"].'
                        </div>
                        <div class="col-md-3">
                                '.$value["duracion_hrs"].'hrs
                        </div>
                        <div class="col-md-3">
                                $'.$value["precio"].'
                        </div>
                    </div>     ';
                    $costoTotal = $costoTotal + $value["precio"];
                    $tiempoTotal += $value["duracion_hrs"];
                    $_SESSION['tiempoTotal'] = $tiempoTotal;
                    $_SESSION['costoTotal'] = $costoTotal;
                }
            }
        }else{
            echo 'No hay servicios seleccionados <br>';
        }
        echo '<div class="row">
                <div class="col-md-6">
                    <strong><br>Total de Servicios : ' .$numServicios. '</strong>
                </div>
                <div class="col-md-2">
                    <strong><br>Tiempo Total : ' .$tiempoTotal. 'hrs </strong>
                </div>
                <div class="col-md-4">
                    <br>
                    <strong>Costo Total : $ '.$costoTotal.'</strong>
                </div>
            </div>';

    }

    
    public function gen_folio(){
        $query = "SELECT MAX(folio) as folio FROM pedidos";;
        $response = TallerM::isUserM($query);
        $num_id = $response["folio"];
        if( is_null($num_id) || $num_id < 1){
            $folio = "0000000001";
            return $folio;
        }
        else{
            $num_id = intval($num_id);
            $len_num = strval($num_id);
            $len_num = strlen($len_num);
            $missing_zeros = 10 - $len_num;
            $folio=null;
            for($i = 0; $i < $missing_zeros; $i++)
                $folio .= "0";
            $folio .= ($num_id + 1);
            return$folio;
        }    
    }

    public function get_folio(){  
        $folio = $this ->gen_folio();
        print("#".$folio);
        
    }

    public function reg_pedido(){
        
        if (isset($_POST["hora"])) {
            $id_user = $_SESSION['id'];
            $tecnico_id = 1;
            $status = 'P';
            $folio = $this->gen_folio();
            $date = date("Y/m/d");
            $total_time = $_SESSION['tiempoTotal'];
            $hours_worked = 0;
            $amount = $_SESSION['costoTotal'];
            $note = $_POST["notas"];
            $query = "INSERT INTO pedidos(usuario_id, tecnico_id, estatus, folio, fecha, fecha_inicio_gral, 
                                        fecha_fin_gral, horas_necesarias, horas_trabajadas, importe, notas) 
                                VALUES($id_user, $tecnico_id, '$status', '$folio', '$date', '$date', '$date',
                                        $total_time, $hours_worked, $amount, '$note');";
            $response = TallerM::insert($query);
            if(!($response))
                echo $query;
                // echo'<script type="text/javascript">
                //     alert("No se inserto el pedido");
                //     window.location.href="index.php?ruta=process_user_services";
                //     </script>';

            //Guardo el folio
            $query = "SELECT P.pedidos_id FROM pedidos P WHERE P.folio like '$folio' ";
            $response = TallerM::isUserM($query);
            $order_id = $response["pedidos_id"];
            
            //Guardo la fecha del pedido
            
            //Guardo la fecha de la cita
            $hora = $_POST["hora"];
            $fecha_inicio_gral = date("d/m/Y ").$hora;
            $fecha_fin_gral = date("d/m/Y ").$hora;
            
            
            //Guardo las notas
            $contadorL = $_SESSION['contadorL'];
            $listaL = $_SESSION['listaL'];
             for ($i=0; $i < $contadorL; $i++){
                $query = "INSERT INTO partidas_pedido (pedidos_id, servicio_id, fecha_inicio, fecha_fin, estatus) 
                                                VALUES ($order_id, $listaL[$i], '$date', '$date', '$status')";
                $response = TallerM::insert($query);
                if(!($response))
                    echo $query;
                else{
                    header("location: ?ruta=detalle_pedido");
                }
                    // echo'<script type="text/javascript">
                    //     alert("No se inserto las partidas del pedido");
                    //     window.location.href="index.php?ruta=process_user_services";
                    //     </script>';
             }
        }
    }

    public function showservices(){
        $id_user = $_SESSION['id'];
        $query = 'SELECT * FROM pedidos WHERE usuario_id = "'.$id_user.'"' ;
        $response = TallerM::Select($query);
        echo '<div class = "caja">';
        foreach($response as $key => $value){
            if ($value["estatus"] = 'P') {
                $status = "Pendiente";
            }else{
                $status = "Completado";
            }
            echo '<div class=" row container">
                    <div class=" col-md-2">
                        <strong>Fecha del pedido: <br>'.$value["fecha"].' </strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Folio: <br>'.$value["folio"].'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Estatus: <br>'.$status.'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Importe:<br>'.$value["importe"].' </strong>
                    </div>
                    <div class=" col-md-4">
                        <strong>Notas:<br>'.$value["notas"].' </strong>
                    </div>
                </div> <br><hr>';
                $pedido_id = $value["pedidos_id"];
        }
        echo '<div class=" row container">
                <div class=" col-md-4">
                    <strong>Servicio Solicitado: <br> </strong>
                </div>
                <div class=" col-md-4">
                    <strong>Precio: <br></strong>
                </div>
                <div class=" col-md-4">
                    <strong>Duración: <br></strong>
                </div>
            </div> <br>';
        $query = 'SELECT * FROM  partidas_pedido WHERE pedidos_id = "'.$pedido_id.'"' ;
        $response = TallerM::Select($query);
        foreach($response as $key => $value){
            $query = 'SELECT * FROM  servicios WHERE servicio_id = "'.$value["servicio_id"].'"' ;
            $response = TallerM::Select($query);
            
            foreach($response as $key => $value){
                echo '<div class=" row container">
                    <div class=" col-md-4">
                        '.$value["nombre"].'
                    </div>
                    <div class=" col-md-4">
                        $'.$value["precio"].'
                    </div>
                    <div class=" col-md-4">
                        '.$value["duracion_hrs"].'Hrs
                    </div>
                </div><hr>';

            }
        }
        echo '</div>';
   // $query = 'SELECT * FROM partidas_pedido WHERE pedidos_id = ';
    }
/*
    public function insertService(){
        $name = "Optimización del equipo";
        $clave = "optimizacion";
        $precio = 950;
        $duracion_hrs = 1;
        $descripcion = "Realizamos las configuraciones necesarias para obtener un mejor rendimiento en tu equipo";
        $query = "INSERT INTO servicios (nombre, clave, precio, duracion_hrs, descripcion) 
                                VALUES ('$name', 'clave', $precio, $duracion_hrs, '$descripcion')";
        $response = TallerM::insert($query);
        if(!($response))
            echo'<script type="text/javascript">
                 alert("No se inserto El servicios");
                 window.location.href="index.php?ruta=process_user_services";
                 </script>';
    }
*/

}

    