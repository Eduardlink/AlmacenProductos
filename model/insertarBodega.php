<?php

include 'conexion.php';

$id = $_POST["id_bod"];
$nombre = $_POST["nombre_bod"];
$direccion = $_POST["direccion_bod"];

$sqlInsertar = "INSERT INTO bodegas (id_bod,nombre_bod,direccion_bod,estado) values('$id','$nombre','$direccion','1')";


if($mysql->query($sqlInsertar)==TRUE){
    echo json_encode("Se agrego una nueva bodega");
}else{
    echo json_encode("No se pudo agregar la bodega");
}
$mysql->close();
?>