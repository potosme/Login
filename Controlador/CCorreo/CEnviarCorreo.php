<?php

class CEnviar{

    public function EnviarCorreo($correo, $codigo){
        $template = file_get_contents('../../Vista/VInicio_Sesion/MensajeCorreo.html');       
        $template = str_replace("{{action_url_1}}", 'http://localhost:8080/SGE-FCYS-Ed/Vista/VInicio_Sesion/NuevaContrasena.php?c='.$codigo, $template);
        $template = str_replace("{{year}}", date('Y'), $template);

        try{

            $para  = $correo;
            $título = 'Recuperación de contraseña';
            $mensaje = $template;
            
            // Para enviar un correo HTML, debe establecerse la cabecera Content-type
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            //cabeceras adicionales
            $cabeceras .= 'From: Soporte <soportefcys@gmail.com>' . "\r\n";    

            // Enviarlo
            mail($para, $título, $mensaje, $cabeceras);

        }catch (Exception $e){
            return false;
        }
    }

    public function CrearCodigoAleatorio(){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
       
        while ($i <= 4) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        
        return $pass;
    }

}

?>