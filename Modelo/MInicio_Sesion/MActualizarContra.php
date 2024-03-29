<?php

//require_once ("../Modelo/Conexionbd.php");

class ContrasenaModelo{

    public function ConsultarUsuarioCorreo($correo){
        $query = "CALL Obtener_Correo('$correo');";
        $mysqli= Conexionbd::ConexionSecurity();
        $consulta = $mysqli->query($query);
        return $consulta;
    }

    public function ActualizarCodigo($correoElectronico, $codigo, $fechaRecuperacion){
        $query = "CALL Actualizar_Codigo('$correoElectronico','$codigo','$fechaRecuperacion');";
        $mysqli= Conexionbd::ConexionSecurity();
        $consulta = $mysqli->query($query);
        return $consulta;
    }

    public function ConsultarUsuarioCodigo($codigo){
        $query = "CALL Obtener_Codigo('$codigo');";
        $mysqli= Conexionbd::ConexionSecurity();
        $consulta = $mysqli->query($query);
        return $consulta;
    }

    public function ActualizarContraseña($codigo, $contrasena){
        $query = "CALL Actualizar_Contraseña('$codigo','$contrasena');";
        $mysqli= Conexionbd::ConexionSecurity();
        $consulta = $mysqli->query($query);
        return $consulta;
    }


}

class Conexionbd{

    public static function  ConexionSecurity()
    {
        try{
            $mysqli = new mysqli('localhost', 'root', '12345', 'sge_bd_2', 3306 ) or die();
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