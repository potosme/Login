$(document).ready(function (){

    $('#btnGuardar').click(function(){
        event.preventDefault();

        if($("#ncontra").val() != "" && $("#ccontra").val() != ""){
            
            var codigo = $("#cod").val();
            var pass1 = $("#ncontra").val();
            var pass2 = $("#ccontra").val();

            $.ajax({
                url: "../../Controlador/CCorreo/CNuevaContra.php",
                type: "POST",
                data: {cod:codigo, ncontra:pass1, ccontra:pass2},
                datatype : 'json',
                cache: false,
                success: function(data){

                    var respuesta = JSON.parse(data);
                            
                    if(respuesta.status == "OK"){
                        swal(respuesta.mensaje)
                        .then(() => {
                            window.location.assign(respuesta.Location);
                        });    
                    }else if(respuesta.status == "ERR"){
                        swal(respuesta.mensaje) 
                        .then(() => {
                            window.location.assign(respuesta.Location);
                        });
                    }
                }      
            });
        }else if($("#ncontra").val() == ""){
            document.getElementById("msgN-error").innerHTML = '<img class="icono-error" id="C-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="N_error">Completa este campo</label>';
            $("#ncontra").focus();
        }else if($("#ccontra").val() == ""){
            document.getElementById("msgC-error").innerHTML = '<img class="icono-error" id="C-error" src="../../Assets/Imagenes/error.png" alt=""> <label class="error" for="name" id="C_error">Completa este campo</label>';
            $("#ccontra").focus();
        }    
    });
});

function Ocultarmensaje(){
    document.getElementById("msgN-error").innerHTML = "";
    document.getElementById("msgC-error").innerHTML = "";

}