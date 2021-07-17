<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if($enlacesModel== "productos" ||  
        $enlacesModel== "sucursales" ||
        $enlacesModel== "contacto" ||
        $enlacesModel== "servicios")
        {
            $module="views/modules/".$enlacesModel.".php";
        }
        else if($enlacesModel=="index")
        {
            $module="views/modules/inicio.php";
        }
        else
        {
            $module="views/modules/inicio.php";
        }
        return $module;

    }
}
?>