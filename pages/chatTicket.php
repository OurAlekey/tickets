<?php
$user = $_GET["usuario"];
$agente = $_GET["agente"];
$asignado = $_GET["asignado"];
$idTicket = $_GET["numticket"];
$consultas =  include("../config/ticketService.php");
$resultTicket = findId($idTicket);
include("../config/usuarioService.php");
$resultUsu =  findAllUsuAgente();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Nuevo Ticket</title>
</head>

<body>
    <?php

    echo "  <input id='usuer' type='hidden'  value='";
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
                            <a class="nav-link " href="/tickets/index.php">Cerrar sesión</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-shrink-0">
        <div class="container-fluid">
            <div class="row">
                <div id="sidebarMenu" class="navbar navbar-dark bg-dark col-2  d-md-block">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <div class="position-sticky pt-3 sidebar-sticky">
                            <hr>
                            <ul class="nav nav-pills flex-column" style="margin-top: 25px;">
                                <li class="nav-item">

                                    <?php echo     "<a class='nav-link  text-white' aria-current='page' href='home.php?usuario=$user&agente=$agente&asignado=N'>Inicio</a>" ?>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" aria-current="page">Nuevo Ticket</a>
                                </li>
                                <li class="nav-item">
                                    <?php echo "<a class='nav-link  text-white' style='display:";
                                    if ($agente == "N") {
                                        echo "none;'>";
                                    } else {
                                        echo ";'  href='home.php?usuario=$user&agente=$agente&asignado=S'>";
                                    }
                                    echo "Tickets Asignados</a>";
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php echo "<a class='nav-link ";
                                    echo " text-white' style='display:";
                                    if ($agente == "N") {
                                        echo "none;'>";
                                    } else {
                                        echo ";'href='usuarios.php?usuario=$user&agente=$agente&asignado=N'>";
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

                <div class="col-10 mt-5">
                    <div class="card mt-3 w-100 container">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>

                                            <?php
                                            foreach ($resultTicket as $valor) {
                                                echo " Numero de Ticket: <input id='tic_id' type='hidden'  value='";
                                                echo $valor['tic_id'];
                                                echo "'></input>     #";

                                                echo $valor['tic_id'];
                                                echo " <br>     Categoria:  ";
                                                echo $valor['cat_descripcion'];
                                                echo "<br> Problema: ";
                                                echo $valor['tic_encabezado'];
                                            } ?>
                                        </h5>
                                    </div>
                                    <div class="col-6" style="display: 
                               <?php
                                if ($agente == "N") {
                                    echo "none;'";
                                }

                                ?>
											;">
                                        <div class="container">
                                            <form method="POST" action="">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>Asignar Usuario</label>
                                                        <select class="form-select" id="usuAsig" name="usuAsig">

                                                            <option value="1" selected>

                                                                <?php

                                                                foreach ($resultTicket as $valor) {

                                                                    if ($valor['tb_usuario_usu_usuario_asignado'] != null) {
                                                                        echo $valor['tb_usuario_usu_usuario_asignado'];
                                                                    } else {
                                                                        echo "Usuarios...";
                                                                    }
                                                                } ?>
                                                            </option>
                                                            <?php

                                                            foreach ($resultUsu as $valor) {

                                                            ?>
                                                                <option value=<?php echo $valor['usu_usuario']; ?>><?php echo $valor['usu_nombre'];
                                                                                                                    echo " ";
                                                                                                                    echo $valor['usu_apellido']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-6">

                                                        <div class="container">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button type="submit" class="btn btn-primary" style=" border-radius: 10px 10px 10px 10px;background:#4087C1;  color: white; border: none;
                                                    margin-top: 25px;

                                                    width: 120px;
                                                    " name="asignar" id="asignar">ASIGNAR</button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <lable>Cambiar estado</lable>
                                                                    <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style=" border-radius: 10px 10px 10px 10px;background:#4087C1;  color: white; border: none;
                                                 
                                                    width: 120px;
                                                    ">
                                                                        Estados
                                                                    </button>
                                                                    <ul class=" dropdown-menu">

                                                                        <li><button type="submit" class="dropdown-item btn btn-info" name="pendiente" id="pendiente">Pendiente</button></li>
                                                                        <li><button type="submit" class="dropdown-item btn btn-secondary" name="resuelto" id="resuelto">Resuelto</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>

                                                        </div>




                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card w-100 container mt-1">

                            <div class="card-body  mt-1" id="pureba" style="  overflow-y: scroll;">
                            </div>

                        </div>

                        <div>

                            <div class="card w-100 container mt-1">
                                <form method="POST">
                                    <div style="margin-top: 10px; margin-bottom: 10px;
                           margin-left:6%;margin-right:10%
                            ">
                                        <div class="row">

                                            <div class="col-10"> <textarea onkeyup="mostrar(this.value)" class="form-control" placeholder="Aaa" style="height: 100px" id="descripcion" name="descripcion"></textarea></div>
                                            <div class="col-2" style="margin-top: 25px;">

                                                <button type="button" class="btn btn-primary" style=" border-radius: 10px 10px 10px 10px;background:#4087C1;  color: white; border: none;" id="accion" name="accion">
                                                    Enviar
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
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
        var heightReturn = height - (height * 0.08)
        $('#sidebarMenu').height(heightReturn);
        var prueba = height - (height * 0.4)
        $('#pureba').height(prueba);

    });
</script>

<script src="../config/chat.js"></script>
<script>
    chatBox = document.getElementById("pureba");
    comentario = ""

    function mostrar(valor) {
        comentario = valor
    }
    bt = document.getElementById("accion");
    inputField = document.getElementById("descripcion");
    idTicket = document.getElementById("tic_id").value;
    user = document.getElementById("usuer").value
    bt.onclick = () => {

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../config/chatTicketPost.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {

                    inputField.value = "";


                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`ticId=${idTicket}&usuIngresaCom=${user}&comDes=${comentario}`);
    }
</script>

<?php

$result = null;
if (isset($_POST['asignar'])) {

    $usuAsig = $_REQUEST['usuAsig'];
    $idTicket;
    if ($usuAsig != 1) {
        $result = actualizarUsuarioAsiganado($usuAsig, $idTicket);
    } else {
        echo '<script>
        swal.fire({
            title: "Ocurrio un error",
            icon: "danger",
            text: "Seleccione un usuario",
            timer: 5000,
            customClass: {
              popup: "container rounded",
            },
            confirmButtonColor: "#3EC3C8",
          });
          </script>';
    }
}
if (isset($_POST['resuelto'])) {

    $result = actualizarEstado(3, $idTicket);
}

if (isset($_POST['pendiente'])) {
    $usuAsig = $_REQUEST['usuAsig'];

    if ($usuAsig != 1) {
        $result = actualizarUsuarioAsiganado($usuAsig, $idTicket);
    }
    $result = actualizarEstado(2, $idTicket);
}


if ($result) {
    echo "<script>location.href = `home.php?usuario=${user}&agente=${agente}&asignado=N`</script>";
} else if ($result == null) {
} else {
    echo '<script>
        swal.fire({
            title: "Ocurrio un error",
            icon: "danger",
            text: "Error al ingresar los datos",
            timer: 5000,
            customClass: {
              popup: "container rounded",
            },
            confirmButtonColor: "#3EC3C8",
          });
          </script>';
}
?>


</html>