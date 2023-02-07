<?php

$host = "mysql-109672-0.cloudclusters.net:10268";
$user = "admin";
$password = "rZOEJdGH";
$database = "almacenproductos";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la basa de datos, el error fue:".
mysqli_connect_error() ;


}

?>