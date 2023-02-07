<?php
    class EnlacesPaginaC{
        public static function enlacesPaginaModelC($enlacesModel){
            if($enlacesModel=="productos"|| $enlacesModel=="compras"){
                $module = "views/modules/".$enlacesModel.".php";
            }else{
                $module = "views/modules/inicioC.php";
            }
            return $module;
        }
    
    }
?>