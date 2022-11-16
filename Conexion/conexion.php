<?php
/*$servidor = "mysql:postgresql://localhost";

try {


    $dbconn = pg_connect("host=localhost port=5432 dbname=ticket user=alex password=Alex.2022$")
        or die('No se ha podido conectar: ' . pg_last_error());
} catch (PDOExpception $e) {
    echo "error de conexion" . $e->getmenssage();
}*/

//por si no muestra las letras acentuadas 
//$pdo = new pdo($servidor,$usuario,$clave, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")));
try {
    $usuario = "alex";
    $passConection = "Alex.2022$";
    $host = "localhost";
    $bd = "ticket";

    $conexion = pg_connect(
        "user=" . $usuario . " " .
            "password=" . $passConection . " " .
            "host=" . $host . " " .
            "dbname=" . $bd
    ) or die("Error al conectar: " . pg_last_error());


    return $conexion;
} catch (Exception $e) {
    echo "error de conexion";
}
