<?php

include "conexion.php";

$buscar = isset($_REQUEST['id_bod']) ? $mysql->real_escape_string($_REQUEST['id_bod']):'';

$result = array();
$result = $mysql->query("SELECT * FROM bodegas WHERE id_bod LIKE '$buscar%' /* AND estado='1' */ ORDER BY id_bod ASC" );
$bodega = array();

while($row = $result->fetch_assoc()){
    array_push($bodega,$row);
}

$respuesta["rows"] = $bodega;
echo json_encode($respuesta);

?>