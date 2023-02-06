<?php

include 'conexion.php';

$id = $_POST['id_bod'];
$nombre = $_POST['nombre_bod'];
$direccion = $_POST['direccion_bod'];
$estado = $_POST['estado'];

$sqlEdit = "UPDATE bodegas SET nombre_bod='$nombre', direccion_bod='$direccion', estado='$estado' WHERE id_bod='$id'";

if($mysql->query($sqlEdit)===TRUE){
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Ocurrio un error");
}
$mysql->close();
?>