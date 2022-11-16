<?php
$idTicket = $_POST["numticket"];
$conexion = include("../Conexion/conexion.php");
$sql = "SELECT * FROM tb_comentario  where tb_ticket_tic_id =$idTicket ";
$resultado = pg_query($conexion, $sql);
$output = "";

if (pg_num_rows($resultado) > 0) {

    while ($valor = pg_fetch_assoc($resultado)) {
        $output .= '
        <div style="margin-left:5%" >
        <div
          style="padding: 8px 16px;
        box-shadow: 0 0 32px rgb(0 0 0 / 8%),
        0rem 16px 16px -16px rgb(0 0 0 / 10%);
        max-width: calc(20% );  
        border-radius: 0px 18px 18px 18px;
        margin-top:10px;   
        background:#4087C1

        ">
        <div style="margin-top:2px; color:white" > 
        ' . $valor['tb_usuario_usu_usuario'] . '
        </div>
        </div>
        <div  
        style="padding: 8px 16px;
        box-shadow: 0 0 32px rgb(0 0 0 / 8%),
        0rem 16px 16px -16px rgb(0 0 0 / 10%);
        max-width: calc(90% );
        border-radius: 0px 18px 18px 18px;
        margin-top:10px;    
        ">
        <div style= " margin-left: 10px;
        margin-right: 10px;">
            <p>' . $valor['com_descripcion'] . '</p>
        </div>
       
        </div></div>';
    }
} else {
    $output = '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
}
echo $output;
