<?php
class TallerC{

    public function IsUser(){
        $tabla = 'usuario';
        if(isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["tipo_usuario"])){
            $user = $_POST["user"];
            $passw = $_POST["password"];
            $user_type = $_POST["tipo_usuario"];

            if($user_type == 'U'){
                $query = "SELECT * FROM usuario WHERE usuario = '$user' AND passwd = '$passw'";
                $respuesta = TallerM::isUserM($query);
                
                
                if ($respuesta["usuario_id"] > 0)
                {
                    $_SESSION['id'] = $respuesta["usuario"];
                    header("location: ?ruta=user_services");
                    
                               
                }
                else
                    header("location: ?ruta=loginerror");
            }
            /**********************************        LOGIN FOR TECHNICIANS      ************************************* */
            else{
                $query = "SELECT * FROM tecnico WHERE numero_empleado = '$user' AND passwd = '$passw'";
                $respuesta = TallerM::isUserM($query);
                if ($respuesta["tecnico_id"] > 0)
                {
                    $_SESSION['id'] = $respuesta["tecnico_id"];
                    header("location: ?ruta=calendario");
                    
                               
                }
                else
                    header("location: ?ruta=loginerror");

                
            }
                
            
            
            
        }
    }

    public function new_sale(){
        
    }

}