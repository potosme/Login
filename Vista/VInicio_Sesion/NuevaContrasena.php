<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/Inicio_sesion/nueva_contraseña.css">
    <title>Restablecer Contraseña</title>
</head>
<body>
    <div class="modal" tabindex="-1">  
        <div class="modal-dialog">
            <h1>Sistema de Gestión de Eventos - FCYS</h1>
            <div class="modal-content">
              <div>
                <h5 class="modal-title">Restablecer Contraseña</h5>
              </div>
              <form method="POST">
              <div>
                <div class="grupo">
                    <input type="hidden" name="cod" id="cod" value="<?php echo $_GET['c']; ?>">
                    <div id="msgN-error"> </div>
                    <input type="password" name="ncontra" id="ncontra" oninput="Ocultarmensaje()" required>
                    <label>Nueva contraseña</label>
                </div>  
                <div class="grupo">
                    <div id="msgC-error"> </div>
                    <input type="password" name="ccontra" id="ccontra" oninput="Ocultarmensaje()" required>
                    <label>Confirmar contraseña</label>
                </div>  
              </div>
              <div>
                <button type="submit" id="btnGuardar" name="btnGuardar" value="guardar" class="btnguardar" data-bs-dismiss="modal">Guardar cambios</button>
              </div>
              </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../Assets/js/CorreoRecuperacion/contrasena.js"></script>
</body>
</html>