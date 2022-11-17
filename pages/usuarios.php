<?php



$user = $_GET["usuario"];
$agente = $_GET["agente"];
$asignado = $_GET["asignado"];

include("../config/usuarioService.php");
$resultado = finAllUsu();
$output = "";
if (pg_num_rows($resultado) > 0) {
    foreach (pg_fetch_all($resultado) as $valor) {
        $output .= "
<tr>
<td style='width:200px; text-align:center ;'>" . $valor['usu_usuario'] . "</td>
<td>" . $valor['usu_nombre'] . "</td>
<td>" . $valor['usu_apellido'] . "</td>
<td>" . $valor['usu_correo'] . "</td>
<td>" . ($valor['usu_rol'] == "U" ? "USUARIO" : "AGENTE") . "</td>
</tr>";
    }
} else {
    $output = '<div >No hay usuarios</div>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <title>Inicio</title>
</head>
<style>
    .body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

<body class="d-flex flex-column h-100">

    <?php

    echo "  <input id='user' type='hidden'  value='";
    echo $user;
    echo "'></input>";
    ?>
    <nav class=" navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Help Desck</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="width: 200px;">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <li class="nav-item">
                            <a class="nav-link active" href="/index.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </nav>


    <main class="flex-shrink-0">

        <div class="container-fluid ">
            <div class="row">
                <div class="navbar navbar-dark bg-dark col-md-2 col-lg-2 d-md-block" style=" width: 200px; ">

                    <div class="position-sticky pt-3 sidebar-sticky">

                        <div class="position-sticky pt-3 sidebar-sticky">
                            <hr>
                            <ul class="nav nav-pills flex-column" style="margin-top: 25px;">
                                <li class="nav-item">
                                    <?php echo     "<a class='nav-link ";

                                    echo " text-white' aria-current='page' href='home.php?usuario=$user&agente=$agente&asignado=N'>Inicio</a>" ?>
                                </li>
                                <li class="nav-item">
                                    <?php echo     "<a class='nav-link  text-white' aria-current='page' href='nuevoTicket.php?usuario=$user&agente=$agente&asignado=N'>Nuevo ticket</a>" ?>
                                </li>
                                <li class="nav-item">
                                    <?php echo "<a class='nav-link ";



                                    echo " text-white' style='display:";
                                    if ($agente == "N") {
                                        echo "none;'>";
                                    } else {
                                        echo ";'  href='home.php?usuario=$user&agente=$agente&asignado=S'>";
                                    }
                                    echo "Tickets Asignados</a>";
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php echo "<a class='nav-link active ";
                                    echo " text-white' style='display:";
                                    if ($agente == "N") {
                                        echo "none;'>";
                                    } else {
                                        echo ";' '>";
                                    }
                                    echo "Usuarios</a>";
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php echo "<a class='nav-link ";
                                    echo " text-white' style='display:";
                                    if ($agente == "N") {
                                        echo "none;'>";
                                    } else {
                                        echo ";'href='ticketsResueltos.php?usuario=$user&agente=$agente&asignado=N'>";
                                    }
                                    echo "Tickets Resueltos</a>";
                                    ?>
                                </li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 ms-sm-auto col-lg-9  mt-4 justify-content-center ">
                    <div class="container mt-5 " style=" margin-bottom: 10px;">
                        <div style="text-align: center; margin-right:20% ;">
                            <h1> Usuarios
                            </h1>
                        </div>
                        <div style="text-align: right ; margin-right:25% ; margin-bottom: 20px;">
                            <?php
                            echo "<a href='registrarUsuario.php?usuario=$user&agente=$agente&asignado=$asignado'>
                                    <button type='submit' class='btn btn-success'>Nuevo Usuario</button>
                                </a>";
                            ?>
                        </div>


                        <scroll-container style=" display: block;		
 									 overflow-y: scroll;
 								 scroll-behavior: smooth;" id="table">





                            <div class="table-responsive mb-5" style="margin-right:20% ;">
                                <table class="table" id="cuerpo">


                                    <tr>
                                        <th style='width:200px; text-align:center ;'>Usuario</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo electronico</th>
                                        <th>Rol</th>
                                    </tr>
                                    <?php
                                    echo  $output;
                                    ?>
                                </table>
                            </div>

                        </scroll-container>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Help Desck-Alexander Say</span>
        </div>
    </footer>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        var height = $(window).height();
        var heightReturn = height - (height * 0.25)
        $(' #table').height(heightReturn);
    });
</script>

</html>