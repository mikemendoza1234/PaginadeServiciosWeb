<?php
require_once "conexionDB.php";

class TallerM extends ConexionBD{

    static public function isUserM($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo -> execute();
        return $pdo -> fetch();
        $pdo -> close();
    }

    static public function insert($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $response;
        if($pdo -> execute())
            $response = true;
        else 
            $response = false;
        return $response;
        $pdo -> close();
    }

    static public function update($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $response;
        if($pdo -> execute())
            $response = true;
        else 
            $response = false;
        return $response;
        $pdo -> close();
    }


    static public function Select($query){
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }
}