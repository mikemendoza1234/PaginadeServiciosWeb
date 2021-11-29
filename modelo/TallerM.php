<?php
require_once "conexionDB.php";

class TallerM extends ConexionBD{
    static public function isUserM($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo -> execute();
        return $pdo -> fetch();
        $pdo -> close();
    }

    static public function insert_user($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $response;
        if($pdo -> execute())
            $response = true;
        else 
            $response = false;
        return $response;
        $pdo -> close();
    }
}