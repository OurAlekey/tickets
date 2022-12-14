<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery.js"></script>
    <script src="config/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inicio</title>
</head>

<body class="login" style="font-family: Quicksand, sans-serif ;">
    <div class="container rounded shadow " style="width: 450px;">
        <div class="row p-5  ">

            <div class="logo-center">
                <img src="img/logo.png" alt="logo" class="logo-image">
                
            <h6 class="title">Help Desck</h6>
            </div>

            <h3 class="title">Iniciar Sesión</h3>
            <form method="post" id="login">

                <div class="mb-4">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="alex">
                </div>

                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="*******">
                <div class="d-grid mt-5">
                    <button type="submit" class="btn btn-info" style="color:#FFFFFF" name="login" id="login">Acceder</button>
                </div>

                <div class="my-3">
                    <span> No tienes cuenta? <a href="pages/registrarUsuario.php?usuario=N&agente=N&asignado=N">Registrate</a></span><br>
             
                </div>
            </form>
        </div>
    </div>

</body>

</html>