<?php


$user = $_GET["usuario"];
$agente = $_GET["agente"];
$asignado = $_GET["asignado"];
$consultas =  include("../config/categoriaService.php");
$result = findAllCat();
$consultas =  include("../config/usuarioService.php");
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

	<nav class="navbar navbar-dark bg-dark fixed-top">
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
	</nav>
	<main class="flex-shrink-0">
		<div class="container-fluid ">
			<div class="row">
				<div id="sidebarMenu" class="navbar navbar-dark bg-dark col-md-2 col-lg-2 d-md-block" style="position: static; width: 200px; ">

					<div class="position-sticky pt-3 sidebar-sticky" style="position: static;">

						<div class="position-sticky pt-3 sidebar-sticky" style="position: static;">
							<hr>
							<ul class="nav nav-pills flex-column" style="margin-top: 25px;">
								<li class="nav-item">

									<?php echo 	"<a class='nav-link  text-white' aria-current='page' href='home.php?usuario=$user&agente=$agente&asignado=N'>Inicio</a>" ?>

								</li>
								<li class="nav-item">
									<a class="nav-link active text-white" aria-current="page">Nueo Ticket</a>
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
				<div class="col-md-9 ms-sm-auto col-lg-9 px-md-4 mt-5">
					<div class="container w-100 mt-5 " style="margin-right:20% ;">
						<div class="col bg-white p-4 rounded-end rounded shadow" style="margin-right:20% ;">


							<!-- .mb-4*3 pner eso -->
							<div class="mb-3">
								<h3 for="exampleFormControlInput1" class="form-label">Nuevo Ticket</h3>
							</div>
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="mb-3">
									<div class="row">

										<div class="col-3">
											<label for="seleccion">Seleccion una categoria</label>

											<select class="form-select" id="categoria" name="categoria">

												<option value="0" selected>Categorias..</option>
												<?php

												foreach ($result as $valor) {

												?>
													<option value=<?php echo $valor['cat_id']; ?>><?php echo $valor['cat_descripcion']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-3" style="display: 
											<?php
											if ($agente == "N") {
												echo "none;'";
											}

											?>
											;">
											<label>Asignar Usuario</label>
											<select class="form-select" id="usuAsig" name="usuAsig">

												<option value="1" selected>Uusarios...</option>
												<?php

												foreach ($resultUsu as $valor) {

												?>
													<option value=<?php echo $valor['usu_usuario']; ?>><?php echo $valor['usu_nombre'];
																										echo " ";
																										echo $valor['usu_apellido']; ?></option>
												<?php } ?>
											</select>
										</div>


									</div>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Asunto del problema</label>
									<input type="text" class="form-control" id="tiWtulo" name="titulo" placeholder="Equipo no funciona" required>
								</div>
								<div class=" mb-3">
									<label for="exampleFormControlInput1" class="form-label" require>Descripcion</label>
									<textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Hoy al llegar mi maquina ya no encendia." required>



										</textarea>
								</div>
								<div style="text-align: right;">
									<button type="submit" class="btn btn-primary" style="width: 150px;" id="enviar" name="enviar">Enviar</button>
								</div>
							</form>

						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="footer mt-auto py-3 bg-light">
		<div class="">
			<span class="text-muted">Help Desck-Alexander Say</span>
		</div>
	</footer>
</body>
<script type="text/javascript">
	$(document).ready(function() {

		var height = $(window).height();
		var heightReturn = height - (height * 0.08)
		$('#sidebarMenu').height(heightReturn);
	});
</script>

<?php
if (isset($_POST['enviar'])) {
	$asunto  = $_POST['titulo'];
	$descripcion  = $_POST['descripcion'];
	$categoria = $_REQUEST['categoria'];
	$usuAsig = $_REQUEST['usuAsig'];
	$consultas =  include("../config/ticketService.php");
	if ($agente == "S" &&  $usuAsig != 1) {
		$result = saveAsignado($user, $categoria, $asunto, $descripcion, $usuAsig);
	} else {
		$result = save($user, $categoria, $asunto, $descripcion);
	}


	if ($result) {
		echo "<script>location.href = `home.php?usuario=${user}&agente=${agente}&asignado=N`</script>";
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
}
?>

</html>