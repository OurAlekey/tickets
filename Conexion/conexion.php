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
    $usuario = "hmshxfirmjfxgl";
    $passConection = "8771a65e0f871f59d78559cb92723d643a022d6b82c5b6f9987b061b2dcf457f";
    $host = "ec2-3-227-68-43.compute-1.amazonaws.com";
    $bd = "devq8oscq3asiu";

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
