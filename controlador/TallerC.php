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
                    $_SESSION['id'] = $response["usuario"];
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

}