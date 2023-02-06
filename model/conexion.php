<?php

$servername="mysql-109672-0.cloudclusters.net:10268";
$username="admin";
$password="rZOEJdGH";
$dbname="almacenproductos";

$mysql= new mysqli($servername,$username,$password,$dbname);

if(!$mysql){
echo("No conexion");
}else{
    //echo("Conexion");
}

?>