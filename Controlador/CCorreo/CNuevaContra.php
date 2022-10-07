<?php

require_once ("../../Modelo/MInicio_Sesion/MActualizarContra.php");

$modelcontra = new ContrasenaModelo();

$codigo = $_POST['cod'];
$contrasena = $_POST['ncontra'];
$repetirContrasena = $_POST['ccontra'];

    $usuariocodigo = $modelcontra->ConsultarUsuarioCodigo($codigo);
    
    $registro = mysqli_num_rows($usuariocodigo);

        if ($registro) {
 
                if ($contrasena != $repetirContrasena) {
                    exit(json_encode(
                        ["status"=>"ERR",
                            "Location"=>"../../Vista/VInicio_Sesion/CorreoRecuperacion.html",
                            "mensaje"=>"Las contraseñas no coinciden."]
                    )); 
                   
                } else {
                    $password = md5($_POST['ncontra']);
                    $resultado = $modelcontra->ActualizarContraseña($codigo, $password);
                    if ($resultado != false) {
                        exit(json_encode(
                            ["status"=>"OK",
                                "Location"=>"../../Vista/VInicio_Sesion/Iniciar_Sesion.php",
                                "mensaje"=>"Su contraseña ha sido cambiada con éxito."]
                        ));
                           
                    } else {
                        exit(json_encode(
                            ["status"=>"ERR",
                                "Location"=>"../../Vista/VInicio_Sesion/CorreoRecuperacion.html",
                                "mensaje"=>"Ocurrió un error al intentar cambiar la contraseña."]
                    )); 
                        
                    }
                }  
        }else{
            exit(json_encode(
                ["status"=>"ERR",
                    "Location"=>"../../Vista/VInicio_Sesion/CorreoRecuperacion.html",
                    "mensaje"=>"El código de recuperación de contraseña no es válido. Por favor intenta de nuevo."]
            ));    
        }   


?>