<?php
require_once "conexionDB.php";

class TallerM extends ConexionBD{
    static public function isUserM($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo -> execute();
        return $pdo -> fetch();
        $pdo -> close();
    }
}