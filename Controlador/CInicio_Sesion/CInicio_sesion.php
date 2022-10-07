<?php

session_start();

require_once ("../../Modelo/MInicio_Sesion/MInicio_sesion.php");

$logins = new MInicio_Sesion();

$user = $_POST['usuarioD'];
$pass = md5($_POST['contraD']);


$result=$logins->ConsultarUsuario($user,$pass);

$_SESSION['campo']=$result;

if($result){
    $listaTUsuario = $logins->ListarUsuario($result);
    echo $listaTUsuario;
  
}

?>