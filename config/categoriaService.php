<?php


function findAllCat()
{

    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_categorias";
    $resultado = pg_fetch_all(pg_query($conexion, $sql));
    return $resultado;
}
