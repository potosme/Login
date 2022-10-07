<?php
session_start();

/*error_reporting(0);*/

require_once ("../../Modelo/MInicio_Sesion/MInicio_sesion.php");

$logins = new MInicio_Sesion();

$IdTipoUsuario = $_POST['menuAcceso'];
$idpersonaA = $_SESSION['campo'];


$VistaSesion=$logins->ListarDatosAcademico($idpersonaA,$IdTipoUsuario);

if ($VistaSesion){

$datosPa = $VistaSesion;

$_SESSION['PersonaAcademica'] = $datosPa;



if( $datosPa['ID_Tipo_Usuario'] == '2'){


    $_SESSION['Nombre'] = $datosPa['Primer_Nombre'];
    $_SESSION['Apellido'] = $datosPa['Primer_Apellido'];
    exit(json_encode(
        ["status"=>"OK",
            "Location"=>"../../Vista/Index-Jurado.php",
            "mensaje"=>"cargando página Jurado"]
    ));


}else if ( $datosPa['ID_Tipo_Usuario'] == '3') {

    $_SESSION['NombreCompleto'] = $datosPa['Primer_Nombre']. "  " .$datosPa['Primer_Apellido'];
    $_SESSION['Telefono'] = $datosPa['Telefono'];
    $_SESSION['Email'] = $datosPa['Correo_Electronico'];

    exit(json_encode(
        ["status" => "OK",
            "Location" => "../../Vista/Index-PersonalAcademico.php",
            "mensaje" => "cargando página Academica"]
    ));

}else if ( $datosPa['ID_Tipo_Usuario'] == '6') {

    $_SESSION['NombreCompleto'] = $datosPa['Primer_Nombre']. "  " .$datosPa['Primer_Apellido'];
    $_SESSION['Nombre'] = $datosPa['Primer_Nombre'];
    $_SESSION['Apellido'] = $datosPa['Primer_Apellido'];
    $_SESSION['Telefono'] = $datosPa['Telefono'];
    $_SESSION['ID'] = $datosPa['ID_Tipo_Usuario'];
    $_SESSION['Email'] = $datosPa['Correo_Electronico'];

    exit(json_encode(
        ["status" => "OK",
            "Location" => "../../Vista/Index-Admin.php",
            "mensaje" => "cargando página Administrador"]
    ));

    }else {
    exit(json_encode(
        ["status"=>"ERR",
            "Location"=>"../../Vista/VInicio_Sesion/Iniciar_Sesion.php",
            "mensaje"=>"Ocurrió un error. Intentalo de nuevo."]
    ));
    }

}else{

    exit(json_encode(
        ["status"=>"ERR",
            "Location"=>"../../Vista/VInicio_Sesion/Iniciar_Sesion.php",
            "mensaje"=>"Usuario o Contraseña incorrecta"]
    ));
}

?>