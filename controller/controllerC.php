<?php
    class MvcControllerC{
        public function plantillaC(){
            include "views/lector.php";
        }

        public function enlacesPaginasControllerC(){
            if(isset($_GET['action'])){
                $enlacesControlller = $_GET['action'];
            }else{
                $enlacesControlller = "./views/modules/inicio.php";
            }
            $respuesta = EnlacesPaginaC::enlacesPaginaModelC($enlacesControlller);
            include $respuesta;
        }
    }
?>