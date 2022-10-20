<?php

class Conexionbd{

    public static function  ConexionSecurity()
    {
        try{
            $mysqli = new mysqli('localhost', 'root', '', '' ) or die();
            $mysqli -> set_charset( 'utf8');
            return $mysqli;
        }catch (exception $e){
            echo $e->getMessage();
            // echo mysqli_errno($mysqli) . ":" .mysqli_errno($mysqli) ."/n";
        }
    }

    public static function PathSecurity()
    {
        $path = 'http://localhost/SGE-FCYS-Ed';
        return $path;
    }

}

?>