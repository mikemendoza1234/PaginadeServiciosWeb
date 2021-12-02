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
        $count = 1;
        $catalgo = null;
        foreach($response as $key => $value){
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
            return $folio;
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
                echo'<script type="text/javascript">
                    alert("No se inserto el pedido");
                    window.location.href="index.php?ruta=process_user_services";
                    </script>';

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
                    echo'<script type="text/javascript">
                        alert("No se inserto las partidas del pedido");
                        window.location.href="index.php?ruta=process_user_services";
                        </script>';
             }
        }
    }

    public function showservices(){
        $username = $_SESSION['id'];
        $query = "SELECT * FROM usuario WHERE usuario = '$username'";
        $response = TallerM::isUserM($query);
        $usuario_id = $response["usuario_id"];

        $query = 'SELECT * FROM pedidos WHERE usuario_id = "'.$usuario_id.'"' ;
        $response = TallerM::Select($query);
        foreach($response as $key => $value){
            echo '<div class=" row container">
                    <div class=" col-md-2">
                        <strong>Fecha del pedido:'.$value["fecha"].' </strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Folio: '.$value["folio"].'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Estatus: '.$value["estatus"].'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Importe:'.$value["importe"].' </strong>
                    </div>
                    <div class=" col-md-4">
                        <strong>Notas:'.$value["notas"].' </strong>
                    </div>
                </div> <br><br><hr>';
        }
    //$query = 'SELECT * FROM servicios WHERE ';
    }
    public function get_orders($date){
        $query = "SELECT * FROM pedidos P WHERE P.fecha_inicio_gral = '$date'";
        $response = TallerM::Select($query);
        return $response;

    }

    public function show_calendar(){
        $month_days = date("t");
        echo '<tr>';
        for ($i=1; $i <= $month_days; $i++){
            $val = $i%7;
            $dia = null;
            if($i < 10)
                $dia = "0".strval($i);
            else
                $dia = strval($i);
            $date = $dia."-".date("m")."-".date("Y");
            $dateSQL = date("Y")."-".date("m")."-".$dia;
            $response = $this->get_orders($dateSQL);
            $result = $date;
            foreach($response as $key => $value){
                $folio = intval($value["folio"]);
                $result .= "<br> Fol.#".$folio." Estat:".$value["estatus"];
            }
            
            if( $val != 0)
                echo '<td><button value="'.$dateSQL.'" name="fecha" class="button buttonAutoAjuste">'.$result.'</button></td>';
            else
                echo '</tr>
                <tr>';
        }   
            
    }
    public function print_on_table($response){
        foreach($response as $key => $value){
                
            $order_id = $value["pedidos_id"];
            $status = $value["estatus"];
            $folio = $value["folio"];
            $date = $value["fecha_inicio_gral"];
            $hours_worked = $value["horas_trabajadas"];
            $amount = $value["importe"];
            $note = $value["notas"];
            $custumer_name = $value["nombre"];
            $customer_phone = $value["telefono"];
            $is_completed = '';
            $is_pending = '';
            if($status == 'P')
                $is_pending = 'selected';   
            else
                $is_completed = 'selected';
            
            echo '<div class=" row container">
                    <div class=" col-md-2">
                        <strong>Fecha del pedido: <br>'.$date.' </strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Folio: <br>'.$folio.'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Nombre del cliente: <br>'.$custumer_name.'</strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Telefono del cliente: <br>'.$customer_phone.'</strong>
                    </div>
                    <div class=" col-md-2">
                        <input type="hidden" value="'.$order_id.'" name="order_id[]">
                        <strong>Estatus: <br> <select name="orders[]" class="form-select"> 
                            <option value="P" '.$is_pending.'>Pendiente</option>
                            <option value="C" '.$is_completed.'>Completado</option>
                        </select></strong>
                    </div>
                    <div class=" col-md-2">
                        <strong>Importe:<br>'.$amount.' </strong>
                    </div>
                    <div class=" col-md-4">
                        <strong>Notas:<br>'.$note.' </strong>
                    </div>
                ';


            $query2 = "SELECT P.*, U.nombre, U.duracion_hrs FROM partidas_pedido P  JOIN servicios U ON (P.servicio_id = U.servicio_id) WHERE P.pedidos_id = $order_id";
            $response_order = TallerM::Select($query2);
            
            echo '<table class="table" border="1">
            <thead >
            <tr class="table-dark">
                <th scope="col">Servicio</th>
                <th scope="col">Estatus</th>
                <th scope="col">Duración</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fin</th>
            </tr>
            </thead>
            <tbody>
            ';
            foreach($response_order as $key2 => $order_data){
                
                $partida_id = $order_data["partidas_pedido_id"];
                $start_date = $order_data["fecha_inicio"];
                $end_date = $order_data["fecha_fin"];
                $departure_status  = $order_data["estatus"];
                $service_name = $order_data["nombre"];
                $service_duration = $order_data["duracion_hrs"];
                $is_completed_P = '';
                $is_pending_P = '';
                if($status == 'P')
                    $is_pending_P = 'selected';   
                else
                    $is_completed_P = 'selected';
                echo '<tr>
                    <td>'.$service_name.'</td>
                    <td> 
                        <input type="hidden" value="'.$partida_id.'" name="order_detail_id[]">
                        <select   name="order_detail[]" class="form-select">
                            <option value="P" '.$is_pending_P.'>Pendiente</option>
                            <option value="C" '.$is_completed_P.'>Completado</option>
                        </select>
                    </td>
                    <td>'.$service_duration.'</td>
                    <td>'.$start_date.'</td>
                    <td>'.$end_date.'</td>
                    </tr>
                ';
            }
            echo '</tbody>
            </table>
            </div> <br><hr>
            ';

            

        }
    }

    public function button_Selected(){
        if(isset($_POST["fecha"]))
            $_SESSION["date"] = $_POST["fecha"];
        if( $_SESSION["date"] != null){ 
            $date = $_SESSION["date"];
            $query = "SELECT P.*, U.nombre, U.telefono FROM pedidos P  JOIN usuario U ON (P.usuario_id = U.usuario_id) WHERE P.fecha_inicio_gral = '$date'";
            $response = TallerM::Select($query);
            $this->print_on_table($response);
        } 

    }

    

    public function updating_data(){
        if(isset($_POST["cambios"])){
            $orders = ($_REQUEST["orders"]);
            $orders_id = ($_POST["order_id"]);
            $order_list="(";
            for($i = 0; $i < count($orders); $i++){
                $order_list .= $orders_id[$i].",";
                $query="UPDATE pedidos P SET P.estatus ='$orders[$i]' WHERE P.pedidos_id=$orders_id[$i] ";
                $response = TallerM::update($query);
                if(!($response))
                    echo'<script type="text/javascript">
                        alert("No se actualizo pedido");
                        window.location.href="index.php?ruta=actividades";
                        </script>';

            }
            $order_list = rtrim($order_list, ",");
            $order_list .= ")";

            
            $order_detail = ($_REQUEST["order_detail"]);
            $order_detail_id = ($_REQUEST["order_detail_id"]);
            for($i = 0; $i < count($order_detail); $i++){
                $query="UPDATE partidas_pedido P SET P.estatus ='$order_detail[$i]' WHERE P.partidas_pedido_id=$order_detail_id[$i] ";
                $response = TallerM::update($query);
                if(!($response))
                    echo'<script type="text/javascript">
                        alert("No se actualizaron las partidas del pedido");
                        window.location.href="index.php?ruta=actividades";
                        </script>';
            }

            $query = "SELECT P.*, U.nombre, U.telefono FROM pedidos P  JOIN usuario U ON (P.usuario_id = U.usuario_id) WHERE P.pedidos_id in $order_list";
            #echo $query;
            $response = TallerM::Select($query);
            $this->print_on_table($response);



            
        }
    }
    






}

    