<?php
$conexion= mysqli_connect("mysql-109672-0.cloudclusters.net:10268", "admin", "rZOEJdGH", "almacenproductos");

if(isset($_POST['registrar'])){
  if(strlen($_POST['cedula']) >=1 && strlen($_POST['usuario']) >= 1 && strlen($_POST['clave']) >= 1 
  && strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['telefono']) >= 1 
  && strlen($_POST['direccion']) >= 1 ){

    $cedula = trim($_POST['cedula']);
    $usurio = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);


    $consulta= "INSERT INTO usuarios (cedula, usuario, clave, nombre, apellido, telefono, direccion,root,estado)
    VALUES ('$cedula','$usurio','$clave','$nombre','$apellido','$telefono','$direccion','0','1')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/modules/user.php');
  }
}









?>