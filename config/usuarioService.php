<?php

function findAllUsuAgente()
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_usuario where usu_rol= 'A'";
    $resultado = pg_fetch_all(pg_query($conexion, $sql));
    return $resultado;
};


function finByUsu($user)
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_usuario where usu_usuario= '$user'";
    $resultado = pg_fetch_all(pg_query($conexion, $sql));
    return $resultado;
};

function finAllUsu()
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_usuario";
    $resultado = pg_query($conexion, $sql);
    return $resultado;
}
