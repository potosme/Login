<?php
require_once ("../../Modelo/Conexionbd.php");

class MInicio_Sesion{
   
    public function ConsultarUsuario($usuario,$password){

        $datos = '';
        $query = "CALL Obtener_Usuario_PersonalAcademico('$usuario','$password');";         
        $mysqli= Conexionbd::ConexionSecurity();
        $result = $mysqli->query($query);

        if ($result) {
            /* obtener el array de objetos */
            while ($row = $result->fetch_row()) {
                $datos=  $row[2];
            }
        
            /* liberar el conjunto de resultados */
            $result->close();
        }

        $mysqli->close();
        return $datos;        
    }


    public function ListarUsuario($idpersona){

        $list = '';
        $query = "CAll Listar_Tipo_Usuario($idpersona);";
        $mysqli= Conexionbd::ConexionSecurity();
        $result = $mysqli->query($query);
        
        if($result){
            while ($valores = $result->fetch_array()){
                $list .= $valores[0];
            }
            $result ->close();
        };
           
        $mysqli->close();
        return $list;
    }

    public function ListarDatosAcademico($idpersonaA,$IdTipoUsuario){

        $datos = '';
        $query = "Call Cargar_Acceso_PersonaUsuario($idpersonaA,$IdTipoUsuario);";
        $mysqli= Conexionbd::ConexionSecurity();
        $result = $mysqli->query($query);

        if ($result -> num_rows == 1) {
            $datos = $result->fetch_assoc();
        }

        $mysqli->close();
        return $datos;
    }

    public function ConsultarUsuarioParticipante($usuario,$password){

        $datos = '';
        $query = "CALL Obtener_Usuario_Participante('$usuario','$password');";
        $mysqli= Conexionbd::ConexionSecurity();
        $result = $mysqli->query($query);

        if ($result) {
            /* obtener el array de objetos */
            while ($row = $result->fetch_row()) {
                $datos=  $row[2];
            }
        
            /* liberar el conjunto de resultados */
            $result->close();
        }

        $mysqli->close();
        return $datos;        
    }

    public function ListarDatosParticipante($idpersonaP){

        $datos = '';
        $query = "Call Cargar_Acceso_Participante($idpersonaP);";
        $mysqli= Conexionbd::ConexionSecurity();
        $result = $mysqli->query($query);

        if ($result != null){
            if ($result -> num_rows == 1) {
                $datos = $result->fetch_assoc();

            }
        }
        $mysqli->close();
        return $datos;
    }

}

?>

