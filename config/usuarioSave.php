<?php
$user = isset($_POST['user']) ? $_POST['user'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$contrasena = isset($_POST['clave']) ? $_POST['clave'] : '';
$rol = isset($_POST['rol']) ? $_POST['rol'] : '';


include("../Conexion/conexion.php");
$sql = "INSERT INTO public.tb_usuario(
        usu_usuario, usu_nombre, usu_apellido, usu_correo, usu_contrasena, usu_rol)
        VALUES ('$user',' $nombre','$apellido',' $correo',' $contrasena','$rol')";
$res = pg_query($conexion, $sql);
if (!$res) {
    echo "false";
} else {
    echo "true";
};
