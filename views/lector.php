<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){

  header("Location: includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
<title>Pagina UTA</title>
<img src="images/banner.jpg" style="width:100%" alt="BannerUTA">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
<link rel="stylesheet" href="css/estilos.css">

</head>
<br>
<div class="container is-fluid">




<div class="col-xs-12">
    <nav class="menu">
        <?php include "navigationC.php" ?>
    </nav>
    <section>
        <?php 
            $mvc = new MvcControllerC();
            $mvc->enlacesPaginasControllerC(); 
        ?>
    </section>
  <body>
    <footer>
        Derechos Reservados @Cuarto Software
    </footer>
	</body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



</html>