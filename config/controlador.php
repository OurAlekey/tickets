<?php

$user = isset($_POST['user']) ? $_POST['user'] : '';

$pass = isset($_POST['pass']) ? $_POST['pass'] : '';



$conexion = include("../Conexion/conexion.php");

//$sql = "INSERT INTO tb_estado(
//	 est_descripcion, est_abreviacion)
//VALUES ( 'Nuevo3', 'N')";
// Ejecutamos la consulta (se devolverá true o false):
try {
    $sql = "SELECT *
    FROM tb_usuario where  usu_usuario='$user' and usu_contrasena= '$pass'";
    $result = pg_query($conexion, $sql);
    if (pg_num_rows($result) > 0) {



        $devolver = pg_fetch_object($result, 0);
        if ($devolver->usu_rol == "A") {
            echo "true1";
        } else {
            echo "true";
        }
    } else {
        echo "false";
    }
} catch (Exception  $e) {
    return "false";
}




/*
$people_json = file_get_contents('data.json');
$decoded_json = json_decode($people_json, true);

$users = $decoded_json['usuarios'];


foreach ($users as $user1) {

    if ($user1['user'] == $user && $user1['pass'] == $pass) {
        echo "true";
        $crear = fopen("../report/Usuario $user.txt", 'a') or die("El archivo no fue creado, hubo un error");
        fwrite($crear, " Bienvenido: $user   \n");
        break;
    }
}*/
//if ($data->user == $user && $data->pass == $pass) {
    //echo json_encode('true');
//} else {
 //   echo json_encode('Usuario/Contraseña no validas');
//}
