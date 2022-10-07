$(document).ready(function () {

    $('#botonV').click(function () {

        event.preventDefault();

        if ($("#usuarioD").val() != "" && $("#contraD").val() != ""){
            
            var User = $("#usuarioD").val();
            var Pass = $("#contraD").val();
                    
            console.log(User);
            console.log(Pass);

            $.ajax({
                url: "../../Controlador/CInicio_Sesion/CInicio_sesion.php",
                type: "POST",
                data: {usuarioD:User,contraD:Pass},
                cache: false,
                success: function (result){

                    if(result.length != 2){
                        $("#menuAcceso").html(result);
                        $("#menuAcceso").prop('disabled', false);
                        $("#botonIS").prop('disabled', false);
                        
                    }else {
                        swal("","Usuario o Contraseña incorrecta", "error")
                        .then(() => {
                            window.location.href = "../../Vista/VInicio_Sesion/Iniciar_Sesion.php";
                        });
                    }    
                      
                }
            });

        }else if($("#usuarioD").val() == ""){
            document.getElementById("msgU-error").innerHTML = '<img class="icono-error" id="IU-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="U_error">Completa este campo</label>';
            $("#usuarioD").focus();
        }else if($("#contraD").val() == ""){
            document.getElementById("msgC-error").innerHTML = '<img class="icono-error" id="IC-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="C_error">Completa este campo</label>';
            $("#contraD").focus();
        }
    });     

    
    $('#botonIS').click(function () {

        event.preventDefault();

        if ($("#menuAcceso").val() != ""){
        
            let v1 = $("#menuAcceso").val();

        
            console.log(v1);          

            $.ajax({
                url: "../../Controlador/CInicio_Sesion/CSesionLogin.php",
                type: "POST",
                data: {menuAcceso: v1},
                datatype : 'json',
                cache: false,
                success: function (data) {

                    var respuesta = JSON.parse(data);

                    if ("OK" == respuesta.status) {
                        // en realidad con el error tambien damos un Location (index.php),
                        // pero por el momento sólo redireccionamos si todo OK
                        window.location.assign(respuesta.Location);
                        //var mens = respuesta.mensaje;
                    }else{
                        swal(respuesta.mensaje)
                        .then(() => {
                            window.location.assign(respuesta.Location);
                        });
                    }
                    
                }
            });

        }else if($("#menuAcceso").val() == ""){
            document.getElementById("msgS-error").innerHTML = '<img class="icono-errorS" id="IC-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="errorS" for="name" id="S_error">Seleccione un elemento de la lista</label>';
        }
    });    


    $('#buttonIS2').click(function () {

        event.preventDefault();

        if ($("#usuarioE").val() != "" && $("#contraE").val() != ""){
            
            var User = $("#usuarioE").val();
            var Pass = $("#contraE").val();
            
            console.log(User);
            console.log(Pass);
            
            $.ajax({
                url: "../../Controlador/CInicio_Sesion/CSesionLoginP.php",
                type: "POST",
                data: {usuarioE:User,contraE:Pass},
                datatype : 'json',
                cache: false,
                success: function (data) {

                    var respuesta = JSON.parse(data);

                    if ("OK" == respuesta.status) {
                        // en realidad con el error tambien damos un Location (index.php),
                        // pero por el momento sólo redireccionamos si todo OK
                        window.location.assign(respuesta.Location);
                        //var mens = respuesta.mensaje;
                    }else{
                        swal("",respuesta.mensaje, "error")
                        .then(() => {
                            window.location.assign(respuesta.Location);
                        });
                    }
                    
                }
            
            });

        }else if($("#usuarioE").val() == ""){
            document.getElementById("msgUE-error").innerHTML = '<img class="icono-error" id="IC-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="UE_error">Completa este campo</label>';
            $("#usuarioE").focus();            

        }else if($("#contraE").val() == ""){
            document.getElementById("msgCE-error").innerHTML = '<img class="icono-error" id="IC-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="CE_error">Completa este campo</label>';
            $("#contraE").focus();
            return false;
        }
    });

    $("#usuarioD").click(function(){
        $("#mensaje").hide();
    });

    $("#paraocultar").click(function(){
        $("#mensaje").hide();
    });

    $("#ocultar").click(function(){
        $("#mensaje").hide();
    });

    $("#paramostrar").click(function(){
        $("#mensaje").show();
    });
    
});

function Ocultarmensaje(){
    document.getElementById("msgU-error").innerHTML = "";
    document.getElementById("msgC-error").innerHTML = "";
    document.getElementById("msgS-error").innerHTML = "";
    document.getElementById("msgUE-error").innerHTML = "";
    document.getElementById("msgCE-error").innerHTML = "";
}
    


