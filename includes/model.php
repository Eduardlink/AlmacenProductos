<?php
    class EnlacesPagina{
        public static function enlacesPaginaModel($enlacesModel){
            if($enlacesModel=="usuarios" || $enlacesModel=="bodegas" ||
            $enlacesModel=="productos" || $enlacesModel=="inventarios"){
                $module = "views/modules/".$enlacesModel.".php";
            }else{
                $module = "views/modules/inicio.php";
            }
            return $module;
        }
    
    }
?>