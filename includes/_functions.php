<?php
   
require_once ("conexion.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){

            case 'acceso_user';
            acceso_user();
            break;


		}

	}

function acceso_user() {
    $nombre=$_POST['usuario'];
    $password=$_POST['clave'];
    session_start();
    $_SESSION['usuario']=$nombre;

    $conexion=mysqli_connect("mysql-109672-0.cloudclusters.net:10268","admin","rZOEJdGH","almacenproductos");
    $consulta= "SELECT * FROM usuarios WHERE usuario='$nombre' AND clave='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['root'] == 1){ //admin

        header('Location: ../index1.php');

    }else if($filas['root'] == 0){//lector
        header('Location: ../indexC.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}






