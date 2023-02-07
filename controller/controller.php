<?php
    class MvcController{
        public function plantilla(){
            include "views/user.php";
        }

        public function enlacesPaginasController(){
            if(isset($_GET['action'])){
                $enlacesControlller = $_GET['action'];
            }else{
                $enlacesControlller = "modules/inicio.php";
            }
            $respuesta = EnlacesPagina::enlacesPaginaModel($enlacesControlller);
            include $respuesta;
        }
    }
?>