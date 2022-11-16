<?php




function save($userIn,  $categoria, $titulo, $descripcion)
{
    $conexion = include("../Conexion/conexion.php");




    $sql = "INSERT INTO tb_ticket(tic_encabezado, tb_usuario_usu_usuario_ingresa, tb_estado_est_id, tb_categoria_id) VALUES ( '$titulo', '$userIn', 1, '$categoria')  RETURNING tic_id";
    $res = pg_query($conexion, $sql);
    if (!$res) {
        return false;
    } else {
        $id = 0;
        foreach (pg_fetch_all($res) as $valor) {
            $id =  $valor['tic_id'];
            break;
        }
        $sqlCom = "INSERT INTO public.tb_comentario(com_descripcion, com_fecha, tb_ticket_tic_id, tb_usuario_usu_usuario)
        VALUES ( '$descripcion',now(), $id, '$userIn')";
        $result = pg_query($conexion, $sqlCom);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}

function saveAsignado($userIn,  $categoria, $titulo, $descripcion, $usuAsig)
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "INSERT INTO tb_ticket(tic_encabezado, tb_usuario_usu_usuario_ingresa, tb_estado_est_id, tb_categoria_id,tb_usuario_usu_usuario_asignado) VALUES ( '$titulo', '$userIn', 1, '$categoria','$usuAsig')  RETURNING tic_id";
    $res = pg_query($conexion, $sql);
    if (!$res) {
        return false;
    } else {
        $id = 0;
        foreach (pg_fetch_all($res) as $valor) {
            $id =  $valor['tic_id'];
            break;
        }
        $sqlCom = "INSERT INTO public.tb_comentario(com_descripcion, com_fecha, tb_ticket_tic_id, tb_usuario_usu_usuario)
        VALUES ( '$descripcion',now(), $id, '$userIn')";
        $result = pg_query($conexion, $sqlCom);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}



function findId($idTcket)
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_ticket 
     INNER JOIN tb_categorias on tb_ticket.tb_categoria_id = tb_categorias.cat_id
    where tic_id = $idTcket";
    $resultado = pg_fetch_all(pg_query($conexion, $sql));
    return $resultado;
}

function actualizarEstado($estado, $idTict)
{
    $conexion = include("../Conexion/conexion.php");

    $sql = " UPDATE public.tb_ticket
	SET  tb_estado_est_id=$estado
	WHERE tic_id=$idTict ";
    $result = pg_query($conexion, $sql);
    if (!$result) {
        return false;
    } else {
        return true;
    }
}
function actualizarUsuarioAsiganado($user, $idTict)
{
    $conexion = include("../Conexion/conexion.php");

    $sql = " UPDATE public.tb_ticket
	SET   tb_usuario_usu_usuario_asignado='$user'
	WHERE tic_id= $idTict";
    $result = pg_query($conexion, $sql);
    if (!$result) {
        return false;
    } else {
        return true;
    }
}

function findAllR()
{
    $conexion = include("../Conexion/conexion.php");
    $sql = "SELECT * FROM tb_ticket INNER JOIN tb_estado on tb_ticket.tb_estado_est_id = tb_estado.est_id 
 INNER JOIN tb_categorias on tb_ticket.tb_categoria_id = tb_categorias.cat_id 
 where est_id =3
  order by tic_id ASC";
    return pg_query($conexion, $sql);
}
