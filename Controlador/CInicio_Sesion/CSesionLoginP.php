<?php
session_start();

/*error_reporting(0);*/

require_once ("../../Modelo/MInicio_Sesion/MInicio_sesion.php");

$logins = new MInicio_Sesion();

$user = $_POST['usuarioE'];
$pass = md5($_POST['contraE']);


$IdPersona=$logins->ConsultarUsuarioParticipante($user,$pass);

    $IdParticipante = $logins->ListarDatosParticipante($IdPersona);

    if ($IdParticipante != ''){

        $datosPer = $IdParticipante;
        
        $_SESSION['Participantes'] = $datosPer;

        if( $datosPer['ID_Tipo_Usuario'] == '1'){


            $_SESSION['Nombre'] = $datosPer['Primer_Nombre'];
            $_SESSION['Apellido'] = $datosPer['Primer_Apellido'];
            $_SESSION['Telefono']= $datosPer['Telefono'];
            $_SESSION['Cod'] = $datosPer['CodigoRegistro'];
            exit(json_encode(
                ["status"=>"OK",
                    "Location"=>"../../Vista/Index-Participante.php",
                    "mensaje"=>"cargando página Participante"]
            ));
        }
    }else{

        exit(json_encode(
            ["status"=>"ERR",
                "Location"=>"../../Vista/VInicio_Sesion/Iniciar_Sesion.php",
                "mensaje"=> "Usuario o Contraseña incorrecta"]
        ));
    } 
 
    
?>