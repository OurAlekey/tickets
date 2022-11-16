<?php
$conexion = include("../Conexion/conexion.php");
$sql = "SELECT * FROM tb_ticket INNER JOIN tb_estado on tb_ticket.tb_estado_est_id = tb_estado.est_id 
 INNER JOIN tb_categorias on tb_ticket.tb_categoria_id = tb_categorias.cat_id 
 where est_id in (1,2)
  order by tic_id ASC";
$resultado = pg_query($conexion, $sql);
$output = "";

if (pg_num_rows($resultado) > 0) {



    foreach (pg_fetch_all($resultado) as $valor) {


        $output .= "
<tr>
<td style='width:200px; text-align:center ;'>" . $valor['tic_id'] . "</td>
<td>" . $valor['tb_usuario_usu_usuario_ingresa'] . "</td>
<td>" . $valor['tic_encabezado'] . "</td>
<td>" . $valor['est_descripcion'] . "</td>
<td>" . $valor['cat_descripcion'] . "</td>
<td>
<form action='' method='POST'>
<input type='hidden' name='txtid' value='" . $valor['tic_id'] . "'>
<input class='btn btn-info' type='submit' value='Seleccionar' name='accion'>
</form>
</td>
</tr>";
    }
} else {
    $output = '<div >No hay tickets</div>';
}
$output .= "	<thead>
<tr>
    <th style='width:200px; text-align:center ;'>Numero de ticket</th>
    <th>De:</th>
    <th>Problema</th>
    <th>Estado</th>
    <th>Categoria</th>
    <th>Accion</th>
</tr>
</thead>";
echo $output;
