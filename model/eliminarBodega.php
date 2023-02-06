<?php

include 'conexion.php';

$id = $_POST['id_bod'];

$sqlDelet = "UPDATE bodegas SET estado='0' WHERE id_bod='$id'";

if($mysql->query($sqlDelet)==TRUE){
    echo json_encode("Se elimino correctamente");
}else{
    echo json_encode("Ocurrio un error");
}
$mysql->close();
?>