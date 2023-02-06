<?php

include "conexion.php";

$sqlSelect="SELECT * FROM bodegas";
$respuesta=$mysql->query($sqlSelect);
$result=array();

if($respuesta->num_rows>0){
    while($fila=$respuesta->fetch_assoc()){
        array_push($result,$fila);
    }
}else{
    $result="No existen bodegas";
}
echo json_encode($result);
$mysql->close();
?>