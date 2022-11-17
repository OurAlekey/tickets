<?php
$user = $_GET["usuario"];
$agente = $_GET["agente"];
$asignado = $_GET["asignado"];

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/custom.css">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<title>Nuevo Ticket</title>
</head>
<style>

</style>

<body class="login" style="font-family: Quicksand, sans-serif ;">


	<div class="container">
		<div class="row  ">
			<div class="col-3">


			</div>


			<div class="col container rounded shadow ">
				<div class="row p-5  ">
					<div style="text-align: right;"><a <?php
														if ($agente == "N") {
															echo "href='/index.php'";
														} else {
															echo "href='/tickets/pages/usuarios.php?usuario=$user&agente=$agente&asignado=N'";
														}

														?>> <button type="button" class="btn btn-outline-secondary">Regresar</button></a> </div>
					<div class="logo-center">
						<img src="../img/logo.png" alt="logo" class="logo-image">
						<h6 class="title">Help Desck</h6>
					</div>

					<h3 class="title">Registrarte</h3>

					<form method="post" id="login">

						<div class="contianer">
							<div class="row mt-1">
								<div class="col ">
									<label for="nombre" class="form-label">Nombres</label>
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Alex" required>
								</div>
								<div class="col ">
									<label for="apellido" class="form-label">Apellidos</label>
									<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Say" required>
								</div>
							</div>
							<div class="row  mt-1">
								<div class="col">
									<label for="correo" class="form-label">Correo electronico</label>
									<input type="email" class="form-control" name="correo" id="correo" placeholder="say@gmail.com" required>
								</div>
								<div class="col ">
									<label for="usuario" class="form-label">Usuario</label>
									<input type="text" class="form-control" name="usuario" id="usuario" placeholder="asay" required>
								</div>
							</div>
							<div class="row mt-1 ">
								<div class="col ">
									<label for="clave" class="form-label">Contraseña</label>
									<input type="password" class="form-control" name="clave" id="clave" placeholder="*******" required>
								</div>
								<div class="col" style="display: 
								<?php
								if ($agente == "N") {
									echo "none;'";
								}
								?>
								;">
									<label for="clave" class="form-label">Roles</label>
									<select class="form-select" id="usuAsig" name="usuAsig">
										<option value="U" selected>Usuario</option>
										<option value="A">Agente</option>
									</select>
								</div>

							</div>
						</div>
						<?php
						echo "  <input id='agente' name='agente' type='hidden'  value='";
						echo $agente;
						echo "'></input>";
						?>
						<?php

						echo "  <input id='usuer' type='hidden'  value='";
						echo $user;
						echo "'></input>";
						?>
						<div class="d-grid mt-5">
							<button type="submit" class="btn btn-info" style="color:#FFFFFF" name="register" id="register">Registrarte</button>
						</div>


					</form>
				</div>

			</div>
			<div class="col-3"> </div>
		</div>
	</div>






</body>

<script src="../config/usuarioSave.js"></script>

</html>