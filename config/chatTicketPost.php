<?php

$ticId = $_POST["ticId"];
$usuIngresaCom = $_POST["usuIngresaCom"];
$comDes = $_POST["comDes"];
$conexion = include("../Conexion/conexion.php");
$sql = "INSERT INTO public.tb_comentario(
        com_fecha, tb_ticket_tic_id, tb_usuario_usu_usuario, com_descripcion)
        VALUES ( now(),  $ticId, '$usuIngresaCom', '$comDes');";
$result = pg_query($conexion, $sql);
